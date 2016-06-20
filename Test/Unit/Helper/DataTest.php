<?php
/**
 * @author comsolit AG team tw <info@comsolit.com>
 * @copyright Copyright (c) 2016 comsolit AG (http://www.comsolit.com)
 * @package Comsolit_RappenRunden
 */
namespace Comsolit\RappenRunden\Test\Unit\Helper;

class DataTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Helper
     *
     * @var \Comsolit\RappenRunden\Helper\Data
     */
    protected $_helper;

    /**
     * Scope config mock
     *
     * @var \Magento\Framework\App\Config\ScopeConfigInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $_scopeConfig;

    /**
     *
     */
    public function setUp()
    {
        $className = '\Comsolit\RappenRunden\Helper\Data';
        $objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $arguments = $objectManager->getConstructArguments($className);
        $this->_helper = $objectManager->getObject($className, $arguments);
        /** @var \Magento\Framework\App\Helper\Context $context */
        $context = $arguments['context'];
        $this->_scopeConfig = $context->getScopeConfig();
    }

    /**
     * Test the module is enabled
     */
    public function testIsEnabled()
    {
        $this->_scopeConfig->expects($this->once())
            ->method('getValue')
            ->will($this->returnValue(true));

        $this->assertTrue($this->_helper->isEnabled());
    }

    /**
     * Test the module is not enabled
     */
    public function testIsNotEnabled()
    {
        $this->_scopeConfig->expects($this->once())
            ->method('getValue')
            ->will($this->returnValue(null));

        $this->assertTrue(null === $this->_helper->isEnabled());
    }
}