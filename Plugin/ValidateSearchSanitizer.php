<?php
/**
 * RiseCore Technologies Pvt Ltd, Lucknow, India
 *
 * Copyright © Risecommerce. All rights reserved.
 * 
 * DISCLAIMER
 * 
 * Do not edit or add to this file if you wish to upgrade this extension to newer version in the future.
 * If you wish to customise this module for your needs.
 * Please contact us https://risecommerce.com/contact
 *
 * @category    Risecommerce
 * @package     Risecommerce_SearchSanitizer
 * @developer   Amarjeet Prajapati (amarjeet.wdev@gmail.com)
 * @copyright   Copyright (c) Risecommerce (https://www.risecommerce.com/)
 * @license     https://www.risecommerce.com/LICENSE.txt
 */
namespace Risecommerce\SearchSanitizer\Plugin;
use Magento\Search\Model\Query;
use Magento\Framework\Message\ManagerInterface;
use Risecommerce\SearchSanitizer\Helper\Data as ConfigHelper;

class ValidateSearchSanitizer
{
     /**
     * @var ManagerInterface
     */
        private $messageManager;

     /**
     * @var ConfigHelper
     */

    private $configHelper;

    public function __construct(
        ManagerInterface $messageManager,
        ConfigHelper $configHelper
    ) {
        $this->messageManager = $messageManager;
        $this->configHelper   = $configHelper;
    }

    public function aroundSaveIncrementalPopularity(Query $subject, callable $proceed)
    {
        if (!$this->configHelper->isEnabled()) {
            return $proceed();
        }

        if ($this->isMalicious($subject->getQueryText())) {
            $message = $this->configHelper->getWarningMessage() ?: __('This search term is not allowed.');
            $this->messageManager->addWarningMessage(__($message));
            // stop saving but return as the original method would
            return $subject;
        }

        return $proceed();
    }

    public function aroundSaveNumResults(Query $subject, callable $proceed, $numResults)
    {
        if (!$this->configHelper->isEnabled()) {
            return $proceed($numResults);
        }

        if ($this->isMalicious($subject->getQueryText())) {
            $message = $this->configHelper->getWarningMessage() ?: __('This search term is not allowed.');
            $this->messageManager->addWarningMessage(__($message));
            return $subject;
        }

        return $proceed($numResults);
    }

    private function isMalicious($text)
    {
        if ($text === null) {
            return false;
        }

        // patterns from admin config
        foreach ($this->configHelper->getPatterns() as $pattern) {
            if ($pattern && stripos($text, $pattern) !== false) {
                return true;
            }
        }

        if ($this->configHelper->blockHtml() && $text !== strip_tags($text)) {
            return true;
        }

        if ($this->configHelper->blockUrls() && filter_var($text, FILTER_VALIDATE_URL)) {
            return true;
        }

        return false;
    }
}
