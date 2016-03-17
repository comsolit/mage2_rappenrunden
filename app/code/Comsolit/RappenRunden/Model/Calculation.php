<?php
/**
* @author comsolit AG team tw <info@comsolit.com>
* @copyright Copyright (c) 2016 comsolit AG (http://www.comsolit.com)
* @package Comsolit_RappenRunden
*/
namespace Comsolit\RappenRunden\Model;

class Calculation extends \Magento\Tax\Model\Calculation
{

    public function __construct(
        \Comsolit\RappenRunden\Helper\Data $helper
    )
    {
        $this->_helper = $helper;
    }

    /**
     * Round to 1/20th
     *
     * @param   float $price
     * @return  float
     */
    public function round($price)
    {
        if($this->_helper->_isEnabled()){
            $price = round($price * 20) / 20;
        }
        return $this->priceCurrency->round($price);
    }
}