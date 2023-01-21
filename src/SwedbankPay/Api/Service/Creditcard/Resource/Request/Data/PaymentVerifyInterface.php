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
    const GENERATE_PAYMENT_TOKEN = 'generate_payment_token';
    const GENERATE_RECURRENCE_TOKEN = 'generate_recurrence_token';
    const GENERATE_UNSCHEDULED_TOKEN = 'generate_unscheduled_token';

    /**
     * @return bool
     */
    public function isPageStripdown();

    /**
     * @param bool $pageStripdown
     * @return $this
     */
    public function setPageStripdown($pageStripdown);

    /**
     * @return bool
     */
    public function isGeneratePaymentToken();

    /**
     * @param bool $generatePaymentToken
     * @return $this
     */
    public function setGeneratePaymentToken($generatePaymentToken);

    /**
     * @return bool
     */
    public function isGenerateRecurrenceToken();

    /**
     * @param bool $generateRecurrenceToken
     * @return $this
     * @SuppressWarnings(PHPMD.LongVariable)
     */
    public function setGenerateRecurrenceToken($generateRecurrenceToken);
}
