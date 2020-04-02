<?php
/**
 * @author comsolit AG team tw <info@comsolit.com>
 * @copyright Copyright (c) 2020 comsolit AG (http://www.comsolit.com)
 * @package Comsolit_RappenRunden
 */
namespace Comsolit\RappenRunden\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * Path to config value that contains enabled status
     */
    const XML_PATH_ENABLED = 'comsolit_rappenrunden/general/enable';

    /**
     * Path to config value that contains rounding value
     */
    const XML_PATH_ROUNDING = 'comsolit_rappenrunden/general/rounding';

    /**
     * Retrieve if module is enabled
     *
     * @return Boolean
     */
    public function isEnabled()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_ENABLED,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Retrieve round-options
     *
     * @return int
     */
    public function roundTo()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_ROUNDING,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}
