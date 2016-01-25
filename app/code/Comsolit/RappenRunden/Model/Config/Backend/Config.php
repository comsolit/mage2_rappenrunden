<?php
/**
 * @author Tristan Weissmann <weissmann@comsolit.com>
 * @copyright Copyright (c) 2016 comsolit AG (http://www.comsolit.com)
 * @package Comsolit_RappenRunden
 */
namespace Comsolit\RappenRunden\Model\Config\Backend;

use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Class Config
 *
 * @package Comsolit\RappenRunden\Model\Config\Backend
 */
class Config implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @var \Magento\Framework\App\Helper\Context
     */
    private $context;

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    )
    {
        $this->context = $context;
        $this->scopeConfig = $context->getScopeConfig();
    }

    /**
     * Get allowed currencies
     *
     * @return  array of allowed Currencies
     **/
    public function getCurrencies()
    {
        $allowedCurrencies = $this->scopeConfig->getValue('currency/options/allow');
        $allowedCurrencies = explode(",", $allowedCurrencies);

        $options = [];
        foreach($allowedCurrencies as $k=>$v)
        {
            $options[] = ['value' => $v, 'label' => $v];
        }

        return $options;
    }

    /**
     * Admin Config action
     *
     * @return array
     * @todo: use OptionSourceInterface function toOptionArray to format
     * @see: https://github.com/magento/magento2/blob/develop/lib/internal/Magento/Framework/Data/OptionSourceInterface.php#L16
     */
    public function toOptionArray()
    {
        return $this->getCurrencies();
    }
}