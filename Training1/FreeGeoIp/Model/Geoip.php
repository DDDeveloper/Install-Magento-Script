<?php

namespace Training1\FreeGeoIp\Model;

use Magento\Framework\HTTP\ClientInterface;
use Psr\Log\LoggerInterface as Logger;

class Geoip implements \Training1\FreeGeoIp\Api\GeoipInterface
{
    const NIRVANA = 'XX';

    //General URL
    //const URL = 'https://freegeoip.net/json/';

    //Change URL because general url cannot working.
    const URL = 'https://freegeoip.lwan.ws/json/';


    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var \Magento\Framework\HTTP\PhpEnvironment\RemoteAddress
     */
    private $remoteAddress;

    /**
     * @var Logger
     */
    private $logger;

    /**
     * @todo \Magento\Framework\Json\DecoderInterface $jsonDecoder
     * Geoip constructor.
     *
     * @param ClientInterface                                      $client
     * @param Logger                                               $logger
     * @param \Magento\Framework\HTTP\PhpEnvironment\RemoteAddress $remoteAddress
     */
    public function __construct(ClientInterface $client, Logger $logger, \Magento\Framework\HTTP\PhpEnvironment\RemoteAddress $remoteAddress)
    {
        $this->client = $client;
        $this->logger = $logger;
        $this->remoteAddress = $remoteAddress;
    }

    /**
     * {@inheritdoc}
     */
    public function getCountryCode()
    {
        $result = $this->doRequest();
        if (is_array($result) && isset($result['country_code'])) {
            return $result['country_code'];
        }
        return self::NIRVANA;
    }

    /**
     * @return bool|array
     */
    public function doRequest()
    {
        try {
            $this->client->get(self::URL . $this->remoteAddress->getRemoteAddress());
            $status = $this->client->getStatus();
            $result = $this->client->getBody();
        } catch (\Exception $e) {
            $this->logger->warning($e->getMessage());
            $this->logger->warning($e->getTraceAsString());

            return false;
        }

        if (200 !== $status) {
            $this->logger->warning('Request Status is not 200');
            return false;
        }
        return $result;

    }

}
