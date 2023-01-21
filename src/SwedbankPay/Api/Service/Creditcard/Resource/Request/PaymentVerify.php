<?php

namespace SwedbankPay\Api\Service\Creditcard\Resource\Request;

use SwedbankPay\Api\Service\Creditcard\Resource\Request\Data\PaymentVerifyInterface;
use SwedbankPay\Api\Service\Payment\Resource\Request\Payment as PaymentRequest;

/**
 * Verify payment data object
 */
class PaymentVerify extends PaymentRequest implements PaymentVerifyInterface
{
    /**
     * @return bool
     */
    public function isPageStripdown()
    {
        return $this->offsetGet(self::PAGE_STRIPDOWN);
    }

    /**
     * @param bool $pageStripdown
     * @return $this
     */
    public function setPageStripdown($pageStripdown)
    {
        return $this->offsetSet(self::PAGE_STRIPDOWN, $pageStripdown);
    }

    /**
     * @return bool
     */
    public function isGeneratePaymentToken()
    {
        return $this->offsetGet(self::GENERATE_PAYMENT_TOKEN);
    }

    /**
     * @param bool $generatePaymentToken
     * @return $this
     */
    public function setGeneratePaymentToken($generatePaymentToken)
    {
        return $this->offsetSet(self::GENERATE_PAYMENT_TOKEN, $generatePaymentToken);
    }

    /**
     * @return bool
     */
    public function isGenerateRecurrenceToken()
    {
        return $this->offsetGet(self::GENERATE_RECURRENCE_TOKEN);
    }

    /**
     * @param bool $generateRecurrenceToken
     * @return $this
     * @SuppressWarnings(PHPMD.LongVariable)
     */
    public function setGenerateRecurrenceToken($generateRecurrenceToken)
    {
        return $this->offsetSet(self::GENERATE_RECURRENCE_TOKEN, $generateRecurrenceToken);
    }

    /**
     * @return bool
     */
    public function isGenerateUnscheduledToken()
    {
        return $this->offsetGet(self::GENERATE_UNSCHEDULED_TOKEN);
    }

    /**
     * @param bool $flag
     * @return $this
     */
    public function setGenerateUnscheduledToken($flag)
    {
        return $this->offsetSet(self::GENERATE_UNSCHEDULED_TOKEN, $flag);
    }
}
