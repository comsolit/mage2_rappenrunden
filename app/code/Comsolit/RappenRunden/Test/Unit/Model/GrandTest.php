<?php
/**
 * @author Tristan Weissmann <weissmann@comsolit.com>
 * @copyright Copyright (c) 2016 comsolit AG (http://www.comsolit.com)
 * @package Comsolit_RappenRunden
 */

namespace Comsolit\RappenRunden\Test\Unit\Model;

class QuoteAddressTotalGrandTest extends \PHPUnit_Framework_TestCase
{

    public function __constructTest(\Magento\Contact\Helper\Data $helper)
    {
        $this->_helper = $helper;
    }

    /**
     * Collect grand total address amount
     *
     * @param \Magento\Quote\Model\Quote $quote
     * @param \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment
     * @param \Magento\Quote\Model\Quote\Address\Total $total
     * @return $this
     */
    public function collectTest(
        \Magento\Quote\Model\Quote $quote,
        \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment,
        \Magento\Quote\Model\Quote\Address\Total $total
    ) {

        $totals = array_sum($total->getAllTotalAmounts());
        $baseTotals = array_sum($total->getAllBaseTotalAmounts());

        if($this->_helper->_getScope() == 'totals' || $this->_helper->_getScope() == 'all')
        {
            $total->setGrandTotal($this->_helper->_roundBase5($totals));
            $total->setBaseGrandTotal($this->_helper->_roundBase5($baseTotals));
        } else {
            $total->setGrandTotal($totals);
            $total->setBaseGrandTotal($baseTotals);
        }

        return $this;
    }

}