<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/enums/value_rule_set_dimension.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V10\Enums;

class ValueRuleSetDimension
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
=google/ads/googleads/v10/enums/value_rule_set_dimension.protogoogle.ads.googleads.v10.enums"�
ValueRuleSetDimensionEnum"s
ValueRuleSetDimension
UNSPECIFIED 
UNKNOWN
GEO_LOCATION

DEVICE
AUDIENCE
NO_CONDITIONB�
"com.google.ads.googleads.v10.enumsBValueRuleSetDimensionProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v10/enums;enums�GAA�Google.Ads.GoogleAds.V10.Enums�Google\\Ads\\GoogleAds\\V10\\Enums�"Google::Ads::GoogleAds::V10::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

