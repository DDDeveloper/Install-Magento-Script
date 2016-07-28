<?php

namespace Training1\FreeGeoIp\Observer;

use Magento\Framework\Event\ObserverInterface;

//use Training1\FreeGeoIp\Api\GeoipInterface;

class Country implements ObserverInterface
{
    /**
     * @var \Magento\Customer\Model\Visitor
     */
    private $_customerVisitor;

    /**
     * @var GeoipInterface
     */
    private $_geopi;

    /**
     * @var string
     */
    protected $logger;


    public function __construct(
        \Training1\FreeGeoIp\Api\GeoipInterface $geoip,
        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->_geopi = $geoip;
        $this->logger = $logger;


    }


    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $this->_customerVisitor = $observer->getData('visitor');
        $json = $this->_geopi->doRequest();
        $this->logger->debug($json);

    }
}