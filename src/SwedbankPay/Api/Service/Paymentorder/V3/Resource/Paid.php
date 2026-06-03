<?php

namespace SwedbankPay\Api\Service\Paymentorder\V3\Resource;

use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\DetailsInterface;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Data\PaidInterface;
use SwedbankPay\Api\Service\Resource\Response as ResponseResource;

/**
 * v3.1 `paid` sub-resource. Holds settlement details and the tokens that were top-level
 * on the v2 paymentOrder response (paymentToken, recurrenceToken, unscheduledToken,
 * nonPaymentToken, externalNonPaymentToken, transactionsOnFileToken).
 *
 * The token getters first look at `paid.<token>` and fall back to `paid.details.<token>`,
 * since Swedbank places some tokens in `details` depending on the payment instrument.
 */
class Paid extends ResponseResource implements PaidInterface
{
    use LinkResourceTrait;

    /** @return int|null */
    public function getNumber()
    {
        return $this->offsetGet(self::NUMBER);
    }

    /** @return string|null */
    public function getInstrument()
    {
        return $this->offsetGet(self::INSTRUMENT);
    }

    /** @return string|null */
    public function getPayeeReference()
    {
        return $this->offsetGet(self::PAYEE_REFERENCE);
    }

    /** @return string|null */
    public function getTransactionType()
    {
        return $this->offsetGet(self::TRANSACTION_TYPE);
    }

    /** @return int|null */
    public function getAmount()
    {
        return $this->offsetGet(self::AMOUNT);
    }

    /** @return int|null */
    public function getSubmittedAmount()
    {
        return $this->offsetGet(self::SUBMITTED_AMOUNT);
    }

    /** @return int|null */
    public function getFeeAmount()
    {
        return $this->offsetGet(self::FEE_AMOUNT);
    }

    /** @return int|null */
    public function getDiscountAmount()
    {
        return $this->offsetGet(self::DISCOUNT_AMOUNT);
    }

    /** @return string|null */
    public function getPaymentToken()
    {
        return $this->offsetGet(self::PAYMENT_TOKEN);
    }

    /** @return string|null */
    public function getRecurrenceToken()
    {
        return $this->offsetGet(self::RECURRENCE_TOKEN);
    }

    /** @return string|null */
    public function getUnscheduledToken()
    {
        return $this->offsetGet(self::UNSCHEDULED_TOKEN);
    }

    /** @return string|null */
    public function getNonPaymentToken()
    {
        $token = $this->offsetGet(self::NON_PAYMENT_TOKEN);

        if ($token === null && $this->getDetails() instanceof DetailsInterface) {
            return $this->getDetails()->getNonPaymentToken();
        }

        return $token;
    }

    /** @return string|null */
    public function getExternalNonPaymentToken()
    {
        $token = $this->offsetGet(self::EXTERNAL_NON_PAYMENT_TOKEN);

        if ($token === null && $this->getDetails() instanceof DetailsInterface) {
            return $this->getDetails()->getExternalNonPaymentToken();
        }

        return $token;
    }

    /** @return string|null */
    public function getTransactionsOnFileToken()
    {
        $token = $this->offsetGet(self::TRANSACTIONS_ON_FILE_TOKEN);

        if ($token === null && $this->getDetails() instanceof DetailsInterface) {
            return $this->getDetails()->getTransactionsOnFileToken();
        }

        return $token;
    }

    /** @return DetailsInterface|null */
    public function getDetails()
    {
        return $this->offsetGet(self::DETAILS);
    }
}
