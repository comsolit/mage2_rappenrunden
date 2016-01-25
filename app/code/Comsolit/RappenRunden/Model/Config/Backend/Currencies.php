<?php
/**
 * @author Tristan Weissmann <weissmann@comsolit.com>
 * @copyright Copyright (c) 2016 comsolit AG (http://www.comsolit.com)
 * @package Comsolit_RappenRunden
 */
namespace Comsolit\RappenRunden\Model\Config\Backend;

use Comsolit\RappenRunden\Model\Config\Backend;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Class Currencies
 */
class Currencies implements \Magento\Framework\Data\OptionSourceInterface
{

    /**
     * Path to config value that contains comma seperated enabled currencies
     */
    const XML_PATH_CURRENCIES = 'comsolit_rappenrunden/general/currencies';

    /**
     * @var array
     */
    protected $options;

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(\Magento\Framework\App\Helper\Context $context)
    {
        $this->scopeConfig = $context->getScopeConfig();
    }


    /**
     * To option array
     *
     * @return array
     */
    public function toOptionArray()
    {
        if (!$this->options) {
            $this->options = $this->collectionFactory->create()->toOptionIdArray();
        }
        return $this->options;

        $options = $enabledCurrencies = explode(',', $this->scopeConfig->getValue(self::XML_PATH_CURRENCIES, ScopeInterface::SCOPE_STORE));
        return $this->toOptionArray();
    }
}