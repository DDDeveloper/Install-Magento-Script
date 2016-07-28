<?php

/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Training\Test\Controller\Adminhtml\Action;

class Index extends \Magento\Backend\App\Action {
    
    public function execute()
    {
        echo "Admin 😉 - Inchoo\\CustomControllers\\Controller\\Adminhtml\\Demonstration\\Sayadmin - execute() method";
    }

//    protected function _isAllowed() {
//        $secret = $this->getRequest()->getParam('secret');
//        return isset($secret) && (int) $secret == 1;
//    }

}
