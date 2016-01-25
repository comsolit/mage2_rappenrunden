<?php
/**
 * @author Tristan Weissmann <weissmann@comsolit.com>
 * @copyright Copyright (c) 2016 comsolit AG (http://www.comsolit.com)
 * @package Comsolit_RappenRunden
 * @info: This applies to the Cart Price only
 */
namespace Comsolit\RappenRunden\Model;

class Cart extends \Magento\Catalog\Model\Product
{

    public function __construct(
        \Comsolit\RappenRunden\Helper\Data $helper
    )
    {
        $this->_helper = $helper;
    }

    /**
     * Get product final price
     *
     * @param float $qty
     * @return float
     */
    public function getFinalPrice($qty = null)
    {
        if($this->_helper->_getScope() == 'all')
        {
            if ($this->_getData('final_price') === null) {
                $price = $this->_helper->_roundBase5($this->getPriceModel()->getFinalPrice($qty, $this));
                $this->setFinalPrice($price);
            }

            $price = $this->_getData('final_price');

            return $this->_helper->_roundBase5($price);
        }

        return $this->_getData('final_price');
    }

}