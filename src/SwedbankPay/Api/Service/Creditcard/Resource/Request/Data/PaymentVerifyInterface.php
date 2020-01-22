<?php

namespace SwedbankPay\Api\Service\Creditcard\Resource\Request\Data;

use SwedbankPay\Api\Service\Payment\Resource\Request\Data\PaymentRequestInterface;

/**
 * Verify Payment Interface
 *
 * @api
 */
interface PaymentVerifyInterface extends PaymentRequestInterface
{
    const PAGE_STRIPDOWN = 'page_stripdown';

    /**
     * @return bool
     */
    public function isPageStripdown();

    /**
     * @param bool $pageStripdown
     * @return $this
     */
    public function setPageStripdown($pageStripdown);
}
