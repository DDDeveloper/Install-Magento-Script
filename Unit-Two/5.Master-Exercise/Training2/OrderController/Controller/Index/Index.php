<?php

namespace Training2\OrderController\Controller\Index;
use \Magento\Framework\Controller\ResultFactory;
use \Magento\Framework\App\Action\Context;
use \Magento\Framework\View\Result\PageFactory;
use \Training2\OrderController\Helper\Training2;

class Index extends \Magento\Framework\App\Action\Action
{
    /** @var \Magento\Framework\View\Result\PageFactory  */
    protected $resultPageFactory;

       /**
     * @var \Magento\Framework\App\Action\Context
     */
    protected $_context;
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;
    /**
     * @var \Training2\OrderController\Helper\Training2
     */
    protected $_helper;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Training2\OrderController\Helper\Training2 $helper
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        Training2 $helper
    )
    {
        $this->_context = $context;
        $this->_pageFactory = $pageFactory;
        $this->_helper = $helper;
        parent::__construct($context);
    }
    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $orderId = $this->getRequest()->getParam('orderId');

        $orderData = array('response' => null);
        if ($orderId) {
            $orderData['response'] = $this->_helper->getOrderData($orderId);
        } else {
            $orderData = array('response' => 'error');
        }

        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $resultJson->setData($orderData);
        return $resultJson;
    }
}
