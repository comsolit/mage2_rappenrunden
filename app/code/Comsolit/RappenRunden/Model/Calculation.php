<?php
/**
* @author comsolit AG team tw <info@comsolit.com>
* @copyright Copyright (c) 2016 comsolit AG (http://www.comsolit.com)
* @package Comsolit_RappenRunden
*/
namespace Comsolit\RappenRunden\Model;

class Calculation
{

    public function __construct(
        \Comsolit\RappenRunden\Helper\Data $helper
    )
    {
        $this->_helper = $helper;
    }


    public function beforeRound($interceptedInput, $price)
    {
        if($this->_helper->_isEnabled()){
            $price = round($price * 20) / 20;
        }
        return [$price];
    }

}