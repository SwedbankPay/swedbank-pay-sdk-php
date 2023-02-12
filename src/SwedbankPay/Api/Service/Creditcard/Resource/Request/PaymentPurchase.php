<?php

namespace SwedbankPay\Api\Service\Creditcard\Resource\Request;

use SwedbankPay\Api\Service\Creditcard\Resource\Request\Data\PaymentCardholderInterface;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\Data\PaymentRiskIndicatorInterface;
use SwedbankPay\Api\Service\Payment\Resource\Request\Payment as PaymentRequest;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\Data\PaymentPurchaseInterface;
use SwedbankPay\Api\Service\Payment\Resource\Collection\PricesCollection;

/**
 * Purchase payment data object
 */
class PaymentPurchase extends PaymentRequest implements PaymentPurchaseInterface
{
    /**
     * @return PricesCollection
     */
    public function getPrices()
    {
        return $this->offsetGet(self::PRICES);
    }

    /**
     * @param PricesCollection|array $prices
     * @return $this
     */
    public function setPrices($prices)
    {
        if (!($prices instanceof PricesCollection)) {
            $prices = new PricesCollection($prices);
        }

        return $this->offsetSet(self::PRICES, $prices);
    }

    /**
     * @return string
     */
    public function getPaymentToken()
    {
        return $this->offsetGet(self::PAYMENT_TOKEN);
    }

    /**
     * @param string $paymentToken
     * @return $this
     */
    public function setPaymentToken($paymentToken)
    {
        return $this->offsetSet(self::PAYMENT_TOKEN, $paymentToken);
    }

    /**
     * @return string
     */
    public function getUnscheduledToken()
    {
        return $this->offsetGet(self::UNSCHEDULED_TOKEN);
    }

    /**
     * @param string $paymentToken
     * @return $this
     */
    public function setUnscheduledToken($paymentToken)
    {
        return $this->offsetSet(self::UNSCHEDULED_TOKEN, $paymentToken);
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
     * @return string
     */
    public function getRecurrenceToken()
    {
        return $this->offsetGet(self::RECURRENCE_TOKEN);
    }

    /**
     * @param string $recurrenceToken
     * @return $this
     */
    public function setRecurrenceToken($recurrenceToken)
    {
        return $this->offsetSet(self::RECURRENCE_TOKEN, $recurrenceToken);
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

    /**
     * @return PaymentCardholderInterface
     */
    public function getCardholder()
    {
        return $this->offsetGet(self::CARDHOLDER);
    }

    /**
     * @param PaymentCardholderInterface $cardholder
     * @return $this
     */
    public function setCardholder($cardholder)
    {
        return $this->offsetSet(self::CARDHOLDER, $cardholder);
    }

    /**
     * @return PaymentRiskIndicatorInterface
     */
    public function getRiskIndicator()
    {
        return $this->offsetGet(self::RISK_INDICATOR);
    }

    /**
     * @param PaymentRiskIndicatorInterface $riskIndicator
     * @return $this
     */
    public function setRiskIndicator($riskIndicator)
    {
        return $this->offsetSet(self::RISK_INDICATOR, $riskIndicator);
    }
}
