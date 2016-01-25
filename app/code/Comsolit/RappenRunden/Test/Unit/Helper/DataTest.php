<?php
/**
 * @author Tristan Weissmann <weissmann@comsolit.com>
 * @copyright Copyright (c) 2016 comsolit AG (http://www.comsolit.com)
 * @package Comsolit_RappenRunden
 */
namespace Comsolit\RappenRunden\Test\Unit\Helper;


class DataTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Helper
     *
     * @var \Magento\Contact\Helper\Data
     */
    protected $_helper;

    /**
     * Scope config mock
     *
     * @var \Magento\Framework\App\Config\ScopeConfigInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $_scopeConfig;

    /**
     * Customer session mock
     *
     * @var \Magento\Customer\Model\Session|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $_customerSession;

    /**
     * Customer view helper mock
     *
     * @var \Magento\Customer\Helper\View|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $_customerViewHelper;

    public function setUp()
    {
        $objectManagerHelper = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $className = '\Comsolit\RappenRunden\Helper\Data';
        $arguments = $objectManagerHelper->getConstructArguments($className);
        /**
         * @var \Magento\Framework\App\Helper\Context $context
         */
        $context = $arguments['context'];
        $this->_scopeConfig = $context->getScopeConfig();
        $this->_customerSession = $arguments['customerSession'];
        $this->_customerViewHelper = $arguments['customerViewHelper'];
        $this->_helper = $objectManagerHelper->getObject($className, $arguments);
    }


    public function test_isEnabled()
    {
        $this->_scopeConfig->expects($this->once())
            ->method('getValue')
            ->will($this->returnValue('1'));

        $this->assertTrue(is_string($this->_helper->isEnabled()));
    }

    public function test_enabledCurrencies()
    {
        $this->_scopeConfig->expects($this->once())
            ->method('getValue')
            ->will($this->returnValue('1'));

        $this->assertTrue(array($this->_helper->isEnabled()));
    }


    /**
     * Retrieve enabled currencies
     *
     * @return array
     */
    public function _enabledCurrencies()
    {
        $enabledCurrencies = explode(',', $this->scopeConfig->getValue(self::XML_PATH_CURRENCIES, ScopeInterface::SCOPE_STORE));
        return $enabledCurrencies;
    }

    /**
     * Rounding function
     *
     * @return string
     */
    public function _roundBase5($value)
    {
        return round($value * 20) / 20;
    }

    /**
     * Return the extension scope
     *
     * @return string
     */
    public function _getScope()
    {
        // get default currency
        $defaultCurrency = $this->scopeConfig->getValue(self::XML_PATH_DEFAULT_CURRENCY, ScopeInterface::SCOPE_STORE);

        // get enabled currencies as array
        $enabledCurrencies = explode(',', $this->scopeConfig->getValue(self::XML_PATH_CURRENCIES, ScopeInterface::SCOPE_STORE));

        if ($this->_isEnabled && in_array($defaultCurrency,$this->_enabledCurrencies()))
        {
            return $this->scopeConfig->getValue(self::XML_PATH_SCOPE, ScopeInterface::SCOPE_STORE);
        } else {
            return 'none';
        }
    }
}
