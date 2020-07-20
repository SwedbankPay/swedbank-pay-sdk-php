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
