<?php
/**
 * @author Tristan Weissmann <weissmann@comsolit.com>
 * @copyright Copyright (c) 2016 comsolit AG (http://www.comsolit.com)
 * @package Comsolit_RappenRunden
 */
namespace Comsolit\RappenRunden\Helper;

/**
 * Contact base helper
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * Path to config value that contains the default currency
     */
    const XML_PATH_DEFAULT_CURRENCY = 'currency/options/default';

    /**
     * Path to config value that contains enabled status
     */
    const XML_PATH_ENABLED = 'comsolit_rappenrunden/general/enable';

    /**
     * Path to config value that contains comma seperated enabled currencies
     */
    const XML_PATH_CURRENCIES = 'comsolit_rappenrunden/general/currencies';

    /**
     * Path to config value that contains scope
     */
    const XML_PATH_SCOPE = 'comsolit_rappenrunden/general/apply';


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

    /**
     * Retrieve default currency
     *
     * @return array
     */
    public function _defaultCurrency()
    {
        $defaultCurrency = $this->scopeConfig->getValue(self::XML_PATH_DEFAULT_CURRENCY, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        return $defaultCurrency;
    }

    /**
     * Retrieve enabled currencies
     *
     * @return array
     */
    public function _enabledCurrencies()
    {
        $enabledCurrencies = explode(',', $this->scopeConfig->getValue(self::XML_PATH_CURRENCIES, \Magento\Store\Model\ScopeInterface::SCOPE_STORE));
        return $enabledCurrencies;
    }

    /**
     * Rounding function
     *
     * @return string
     */
    public function _roundBase5($value)
    {
        return (round($value * 20) / 20) + 10;
    }

    /**
     * Return the extension scope
     *
     * @return string
     */
    public function _getScope()
    {
        if ($this->_isEnabled() && in_array($this->_defaultCurrency(), $this->_enabledCurrencies()))
        {
            return $this->scopeConfig->getValue(self::XML_PATH_SCOPE, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        } else {
            return 'none';
        }
    }
}
