<?php

namespace Training1\FreeGeoIp\Api;


interface GeoipInterface
{
    /**
     * Returns the ISO Country Code from an IP Address.
     * This is an outgoing blocking call and delays any further processing
     * of the current request until we receive an answer from the
     * geoip server or library.
     *
     * @return string
     */
    public function getCountryCode();
}