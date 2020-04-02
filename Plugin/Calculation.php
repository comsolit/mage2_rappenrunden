<?php
/**
 * @author comsolit AG team tw <info@comsolit.com>
 * @copyright Copyright (c) 2020 comsolit AG (http://www.comsolit.com)
 * @package Comsolit_RappenRunden
 */
namespace Comsolit\RappenRunden\Plugin;

/**
 * Class Calculation
 * @package Comsolit\RappenRunden\Plugin
 */
class Calculation
{
    /**
     * Helper
     *
     * @var \Comsolit\RappenRunden\Helper\Data
     */
    protected $_helper;

    /**
     * Calculation constructor.
     *
     * @param \Comsolit\RappenRunden\Helper\Data $helper
     */
    public function __construct(\Comsolit\RappenRunden\Helper\Data $helper)
    {
        $this->_helper = $helper;
    }

    /**
     * Overwrite Magento\Directory\Model\PriceCurrency::round
     *
     * Rounds (mini) cart values: discount / totals / and saves to quote & sales tables / leaves original price intact
     *
     * @param $interceptedInput
     * @param $price
     * @return array
     */
    public function beforeRound(\Magento\Directory\Model\PriceCurrency $interceptedInput, $price)
    {
        $rounding = $this->_helper->roundTo();
        if ($this->_helper->isEnabled()) {
            $price = round($price * $rounding) / $rounding;
        }

        return [$price];
    }

    /**
     * Overwrite Magento\Catalog\Pricing\Price\FinalPrice::getValue
     *
     * Rounds price in category and product view
     *
     * @param \Magento\Catalog\Pricing\Price\FinalPrice $subject
     * @param $price
     * @return mixed
     */
    public function afterGetValue(\Magento\Catalog\Pricing\Price\FinalPrice $subject, $price)
    {
        $rounding = $this->_helper->roundTo();
        if ($this->_helper->isEnabled()) {
            $price = max(0, round($price * $rounding) / $rounding);
        }

        return $price;
    }
}