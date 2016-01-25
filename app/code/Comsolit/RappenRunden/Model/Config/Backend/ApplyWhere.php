<?php
/**
 * @author Tristan Weissmann <weissmann@comsolit.com>
 * @copyright Copyright (c) 2016 comsolit AG (http://www.comsolit.com)
 * @package Comsolit_RappenRunden
 */
namespace Comsolit\RappenRunden\Model\Config\Backend;

/**
 * Class ApplyWhere
 */
class ApplyWhere
{
    /**
     * Define where to apply the function
     *
     * @return array of select list options
     */
    public function toOptionArray()
    {
        $configValues = array(
            array('value' => 'all',     'label' => __('All prices and totals')),
            array('value' => 'totals',  'label' => __('Totals only')),
        );

        return $configValues;
    }
}