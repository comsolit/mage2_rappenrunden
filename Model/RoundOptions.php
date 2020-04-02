<?php
/**
 * @author comsolit AG team tw <info@comsolit.com>
 * @copyright Copyright (c) 2020 comsolit AG (http://www.comsolit.com)
 * @package Comsolit_RappenRunden
 */
namespace Comsolit\RappenRunden\Model;

/**
 * Comsolit Rappenrunden "Display Actual Price" attribute source
 */
class RoundOptions extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * ROUND TO 0.1
     */
    const ONE_TENTH = 10;

    /**
     * ROUND TO 0.05
     */
    const ONE_TWENTIETH = 20;

    /**
     * Get all options
     *
     * @return array
     */
    public function getAllOptions()
    {
        if (!$this->_options) {
            $this->_options = [
                ['label' => __('Round to 0.1'), 'value' => self::ONE_TENTH],
                ['label' => __('Round to 0.05'), 'value' => self::ONE_TWENTIETH],
            ];
        }
        return $this->_options;
    }
}
