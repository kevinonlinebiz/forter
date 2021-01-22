<?php namespace Forter\Forter\Plugin\Sales\Block\Adminhtml\Order\Create\Form;

class AccountPlugin
{
    /**
     *
     */
    const PHONE_ORDER_IS_ENABLED = 'forter/advanced_settings/phone_order_enabled';

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * AccountPlugin constructor.
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @param \Magento\Sales\Block\Adminhtml\Order\Create\Form\Account $subject
     * @param $html
     * @return string
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function afterToHtml(\Magento\Sales\Block\Adminhtml\Order\Create\Form\Account $subject, $html)
    {
        if ($this->isPhoneOrderEnabled()) {
            $newBlockHtml = $subject->getLayout()->createBlock('\Magento\Framework\View\Element\Template')->setTemplate('Forter_Forter::order/view/account.phtml')->toHtml();

            return $html . $newBlockHtml;
        }
        return $html;
    }

    /**
     * Check if Forter Phone Order Widget is enabled.
     * @return mixed
     */
    private function isPhoneOrderEnabled()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $isEnabled = $this->scopeConfig->getValue(self::PHONE_ORDER_IS_ENABLED, $storeScope);

        return $isEnabled;
    }
}
