<?php
/**
 * @author comsolit AG team tw <info@comsolit.com>
 * @copyright Copyright (c) 2016 comsolit AG (http://www.comsolit.com)
 * @package Comsolit_RappenRunden
 */
namespace Comsolit\RappenRunden\Plugin;

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
     * @param \Comsolit\RappenRunden\Helper\Data $helper
     */
    public function __construct(\Comsolit\RappenRunden\Helper\Data $helper)
    {
        $this->_helper = $helper;
    }

    /**
     * @param $interceptedInput
     * @param $price
     * @return array
     */
    public function beforeRound($interceptedInput, $price)
    {
        if ($this->_helper->isEnabled()) {
            $price = round($price * 20) / 20;
        }
        return [$price];
    }
}