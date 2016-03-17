<?php
/**
 * @author comsolit AG team tw <info@comsolit.com>
 * @copyright Copyright (c) 2016 comsolit AG (http://www.comsolit.com)
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
     * Retrieve if module is enabled
     *
     * @return Boolean
     */
    public function _isEnabled()
    {
        return (bool)$this->scopeConfig->getValue(
            self::XML_PATH_ENABLED,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

}
