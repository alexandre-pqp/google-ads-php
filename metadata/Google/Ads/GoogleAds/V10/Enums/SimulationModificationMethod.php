<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v10/enums/simulation_modification_method.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V10\Enums;

class SimulationModificationMethod
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
Cgoogle/ads/googleads/v10/enums/simulation_modification_method.protogoogle.ads.googleads.v10.enums"�
 SimulationModificationMethodEnum"c
SimulationModificationMethod
UNSPECIFIED 
UNKNOWN
UNIFORM
DEFAULT
SCALINGB�
"com.google.ads.googleads.v10.enumsB!SimulationModificationMethodProtoPZCgoogle.golang.org/genproto/googleapis/ads/googleads/v10/enums;enums�GAA�Google.Ads.GoogleAds.V10.Enums�Google\\Ads\\GoogleAds\\V10\\Enums�"Google::Ads::GoogleAds::V10::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

