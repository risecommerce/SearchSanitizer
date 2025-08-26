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

class ValidateSearchSanitizer
{
    /**
     * @var ManagerInterface
     */
    private $messageManager;

    public function __construct(ManagerInterface $messageManager)
    {
        $this->messageManager = $messageManager;
    }

    public function aroundSaveIncrementalPopularity(Query $subject, callable $proceed)
    {
        if ($this->isMalicious($subject->getQueryText())) {
            $this->messageManager->addWarningMessage(__('❌ This search term is not allowed.'));
            return $subject; 
        }

        return $proceed();
    }

    public function aroundSaveNumResults(Query $subject, callable $proceed, $numResults)
    {
        if ($this->isMalicious($subject->getQueryText())) {
            $this->messageManager->addWarningMessage(__('❌ This search term is not allowed.'));
            return $subject;
        }

        return $proceed($numResults);
    }

    private function isMalicious($text)
    {
        $sqlPatterns = ['select', 'insert', 'update', 'delete', 'drop', 'union', 'into', 'where', 'www', '.co.uk' , '.com' ,'.io', '.ai'];
        foreach ($sqlPatterns as $pattern) {
            if (stripos($text, $pattern) !== false) {
                return true;
            }
        }

        if ($text !== strip_tags($text)) {
            return true;
        }

        if (filter_var($text, FILTER_VALIDATE_URL)) {
            return true;
        }

        return false;
    }
}
