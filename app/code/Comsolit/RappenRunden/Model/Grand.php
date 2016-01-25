<?php
/**
 * @author Tristan Weissmann <weissmann@comsolit.com>
 * @copyright Copyright (c) 2016 comsolit AG (http://www.comsolit.com)
 * @package Comsolit_RappenRunden
 * @info: This applies to the Grand Total only
 */
namespace Comsolit\RappenRunden\Model;

class Grand extends \Magento\Quote\Model\Quote\Address\Total\Grand
{

    public function __construct(
        \Comsolit\RappenRunden\Helper\Data $helper
    )
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
    public function collect(
        \Magento\Quote\Model\Quote $quote,
        \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment,
        \Magento\Quote\Model\Quote\Address\Total $total
    ) {

        parent::collect($quote, $shippingAssignment, $total);

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