<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/services/asset_set_asset_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V10\Services;

class AssetSetAssetService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Protobuf\Any::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
;google/ads/googleads/v10/enums/asset_set_asset_status.protogoogle.ads.googleads.v10.enums"h
AssetSetAssetStatusEnum"M
AssetSetAssetStatus
UNSPECIFIED 
UNKNOWN
ENABLED
REMOVEDB�
"com.google.ads.googleads.v10.enumsBAssetSetAssetStatusProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v10/enums;enums�GAA�Google.Ads.GoogleAds.V10.Enums�Google\\Ads\\GoogleAds\\V10\\Enums�"Google::Ads::GoogleAds::V10::Enumsbproto3
�
:google/ads/googleads/v10/enums/response_content_type.protogoogle.ads.googleads.v10.enums"o
ResponseContentTypeEnum"T
ResponseContentType
UNSPECIFIED 
RESOURCE_NAME_ONLY
MUTABLE_RESOURCEB�
"com.google.ads.googleads.v10.enumsBResponseContentTypeProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v10/enums;enums�GAA�Google.Ads.GoogleAds.V10.Enums�Google\\Ads\\GoogleAds\\V10\\Enums�"Google::Ads::GoogleAds::V10::Enumsbproto3
�
8google/ads/googleads/v10/resources/asset_set_asset.proto"google.ads.googleads.v10.resourcesgoogle/api/annotations.protogoogle/api/field_behavior.protogoogle/api/resource.proto"�
AssetSetAssetE
resource_name (	B.�A�A(
&googleads.googleapis.com/AssetSetAsset<
	asset_set (	B)�A�A#
!googleads.googleapis.com/AssetSet5
asset (	B&�A�A 
googleads.googleapis.com/Asset`
status (2K.google.ads.googleads.v10.enums.AssetSetAssetStatusEnum.AssetSetAssetStatusB�A:m�Aj
&googleads.googleapis.com/AssetSetAsset@customers/{customer_id}/assetSetAssets/{asset_set_id}~{asset_id}B�
&com.google.ads.googleads.v10.resourcesBAssetSetAssetProtoPZKgoogle.golang.org/genproto/googleapis/ads/googleads/v10/resources;resources�GAA�"Google.Ads.GoogleAds.V10.Resources�"Google\\Ads\\GoogleAds\\V10\\Resources�&Google::Ads::GoogleAds::V10::Resourcesbproto3
�
?google/ads/googleads/v10/services/asset_set_asset_service.proto!google.ads.googleads.v10.services8google/ads/googleads/v10/resources/asset_set_asset.protogoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.protogoogle/rpc/status.proto"�
MutateAssetSetAssetsRequest
customer_id (	B�AR

operations (29.google.ads.googleads.v10.services.AssetSetAssetOperationB�A
partial_failure (
validate_only (j
response_content_type (2K.google.ads.googleads.v10.enums.ResponseContentTypeEnum.ResponseContentType"�
AssetSetAssetOperationC
create (21.google.ads.googleads.v10.resources.AssetSetAssetH =
remove (	B+�A(
&googleads.googleapis.com/AssetSetAssetH B
	operation"�
MutateAssetSetAssetsResponseM
results (2<.google.ads.googleads.v10.services.MutateAssetSetAssetResult1
partial_failure_error (2.google.rpc.Status"�
MutateAssetSetAssetResultB
resource_name (	B+�A(
&googleads.googleapis.com/AssetSetAssetJ
asset_set_asset (21.google.ads.googleads.v10.resources.AssetSetAsset2�
AssetSetAssetService�
MutateAssetSetAssets>.google.ads.googleads.v10.services.MutateAssetSetAssetsRequest?.google.ads.googleads.v10.services.MutateAssetSetAssetsResponse"X���9"4/v10/customers/{customer_id=*}/assetSetAssets:mutate:*�Acustomer_id,operationsE�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
%com.google.ads.googleads.v10.servicesBAssetSetAssetServiceProtoPZIgoogle.golang.org/genproto/googleapis/ads/googleads/v10/services;services�GAA�!Google.Ads.GoogleAds.V10.Services�!Google\\Ads\\GoogleAds\\V10\\Services�%Google::Ads::GoogleAds::V10::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

