<?php

/**
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Ads\GoogleAds\Examples\Remarketing;

require __DIR__ . '/../../vendor/autoload.php';

use GetOpt\GetOpt;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentNames;
use Google\Ads\GoogleAds\Examples\Utils\ArgumentParser;
use Google\Ads\GoogleAds\Examples\Utils\Helper;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V10\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V10\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\V10\GoogleAdsException;
use Google\Ads\GoogleAds\V10\Common\ExpressionRuleUserListInfo;
use Google\Ads\GoogleAds\V10\Common\RuleBasedUserListInfo;
use Google\Ads\GoogleAds\V10\Common\UserListRuleInfo;
use Google\Ads\GoogleAds\V10\Common\UserListRuleItemGroupInfo;
use Google\Ads\GoogleAds\V10\Common\UserListRuleItemInfo;
use Google\Ads\GoogleAds\V10\Common\UserListStringRuleItemInfo;
use Google\Ads\GoogleAds\V10\Enums\UserListMembershipStatusEnum\UserListMembershipStatus;
use Google\Ads\GoogleAds\V10\Enums\UserListPrepopulationStatusEnum\UserListPrepopulationStatus;
use Google\Ads\GoogleAds\V10\Enums\UserListStringRuleItemOperatorEnum\UserListStringRuleItemOperator;
use Google\Ads\GoogleAds\V10\Errors\GoogleAdsError;
use Google\Ads\GoogleAds\V10\Resources\UserList;
use Google\Ads\GoogleAds\V10\Services\UserListOperation;
use Google\ApiCore\ApiException;

/**
 * Creates a rule-based user list defined by an expression rule for users who have visited two
 * different sections of a website.
 */
class AddExpressionRuleUserList
{
    private const CUSTOMER_ID = 'INSERT_CUSTOMER_ID_HERE';
    private const URL_STRING = 'url__';

    public static function main()
    {
        // Either pass the required parameters for this example on the command line, or insert them
        // into the constants above.
        $options = (new ArgumentParser())->parseCommandArguments([
            ArgumentNames::CUSTOMER_ID => GetOpt::REQUIRED_ARGUMENT
        ]);

        // Generate a refreshable OAuth2 credential for authentication.
        $oAuth2Credential = (new OAuth2TokenBuilder())->fromFile()->build();

        // Construct a Google Ads client configured from a properties file and the
        // OAuth2 credentials above.
        $googleAdsClient = (new GoogleAdsClientBuilder())
            ->fromFile()
            ->withOAuth2Credential($oAuth2Credential)
            ->build();

        try {
            self::runExample(
                $googleAdsClient,
                $options[ArgumentNames::CUSTOMER_ID] ?: self::CUSTOMER_ID
            );
        } catch (GoogleAdsException $googleAdsException) {
            printf(
                "Request with ID '%s' has failed.%sGoogle Ads failure details:%s",
                $googleAdsException->getRequestId(),
                PHP_EOL,
                PHP_EOL
            );
            foreach ($googleAdsException->getGoogleAdsFailure()->getErrors() as $error) {
                /** @var GoogleAdsError $error */
                printf(
                    "\t%s: %s%s",
                    $error->getErrorCode()->getErrorCode(),
                    $error->getMessage(),
                    PHP_EOL
                );
            }
            exit(1);
        } catch (ApiException $apiException) {
            printf(
                "ApiException was thrown with message '%s'.%s",
                $apiException->getMessage(),
                PHP_EOL
            );
            exit(1);
        }
    }

    /**
     * Runs the example.
     *
     * @param GoogleAdsClient $googleAdsClient the Google Ads API client
     * @param int $customerId the customer ID
     */
    // [START add_expression_rule_user_list]
    public static function runExample(
        GoogleAdsClient $googleAdsClient,
        int $customerId
    ) {
        // Creates a rule targeting any user that visited a url that contains
        // 'example.com/section1'.
        $rule1 = new UserListRuleItemInfo([
            // Uses a built-in parameter to create a domain URL rule.
            'name' => self::URL_STRING,
            'string_rule_item' => new UserListStringRuleItemInfo([
                'operator' => UserListStringRuleItemOperator::CONTAINS,
                'value' => 'example.com/section1'
            ])
        ]);

        // Creates a rule targeting any user that visited a url that contains
        // 'example.com/section2'.
        $rule2 = new UserListRuleItemInfo([
            // Uses a built-in parameter to create a domain URL rule.
            'name' => self::URL_STRING,
            'string_rule_item' => new UserListStringRuleItemInfo([
                'operator' => UserListStringRuleItemOperator::CONTAINS,
                'value' => 'example.com/section2'
            ])
        ]);

        // Creates an ExpressionRuleUserListInfo object, or a boolean rule that defines this user
        // list. The default rule_type for a UserListRuleInfo object is OR of ANDs (disjunctive
        // normal form). That is, rule items will be ANDed together within rule item groups and
        // the groups themselves will be ORed together.
        $expressionRuleUserListInfo = new ExpressionRuleUserListInfo([
            'rule' => new UserListRuleInfo([
                'rule_item_groups' => [
                    // Combines the two rule items into a UserListRuleItemGroupInfo object so
                    // Google Ads will AND their rules together. To instead OR the rules
                    // together, each rule should be placed in its own rule item group.
                    new UserListRuleItemGroupInfo([
                        'rule_items' => [$rule1, $rule2]
                    ])
                ]
            ])
        ]);

        // Defines a representation of a user list that is generated by a rule.
        $ruleBasedUserListInfo = new RuleBasedUserListInfo([
            // Optional: To include past users in the user list, set the prepopulation_status to
            // REQUESTED.
            'prepopulation_status' => UserListPrepopulationStatus::REQUESTED,
            'expression_rule_user_list' => $expressionRuleUserListInfo
        ]);

        // Creates a user list.
        $userList = new UserList([
            'name' => 'All visitors to example.com/section1 AND example.com/section2 #' .
                Helper::getPrintableDatetime(),
            'description' => 'Visitors of both example.com/section1 AND example.com/section2',
            'membership_status' => UserListMembershipStatus::OPEN,
            'membership_life_span' => 365,
            'rule_based_user_list' => $ruleBasedUserListInfo
        ]);

        // Creates the operation.
        $operation = new UserListOperation();
        $operation->setCreate($userList);

        // Issues a mutate request to add the user list and prints some information.
        $userListServiceClient = $googleAdsClient->getUserListServiceClient();
        $response = $userListServiceClient->mutateUserLists($customerId, [$operation]);
        printf(
            "Created user list with resource name '%s'.%s",
            $response->getResults()[0]->getResourceName(),
            PHP_EOL
        );
    }
    // [END add_expression_rule_user_list]
}

AddExpressionRuleUserList::main();
