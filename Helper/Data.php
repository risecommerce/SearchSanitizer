<?php
namespace Risecommerce\SearchSanitizer\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH = 'searchsanitizer/general/';

    public function isEnabled($storeId = null)
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH . 'enabled',
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    public function getPatterns($storeId = null)
    {
        $patterns = $this->scopeConfig->getValue(
            self::XML_PATH . 'patterns',
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
        if ($patterns === null) {
            return [];
        }
        return array_filter(array_map('trim', explode(',', $patterns)));
    }

    public function getWarningMessage($storeId = null)
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH . 'warning_message',
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    public function blockHtml($storeId = null)
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH . 'block_html',
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    public function blockUrls($storeId = null)
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH . 'block_urls',
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }
}
