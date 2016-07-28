<?php

namespace Training2\Specific404Page\Block;

class Category extends \Magento\Framework\View\Element\AbstractBlock
{
    /**
     * Prepare HTML content
     *
     * @return string
     */
    protected function _toHtml()
    {
        return '<h1>Category not found via Training2_Specific404Page</h1>';
    }

}
