<?php

namespace SwedbankPay\Api\Service\Creditcard\Resource\Request\Data;

use SwedbankPay\Api\Service\Payment\Resource\Request\Data\PaymentRequestInterface;
use SwedbankPay\Api\Service\Payment\Resource\Collection\PricesCollection;

/**
 * Purchase Payment Interface
 *
 * @api
 */
interface PaymentPurchaseInterface extends PaymentRequestInterface
{
    const PRICES = 'prices';
    const PAYMENT_TOKEN = 'payment_token';
    const UNSCHEDULED_TOKEN = 'unscheduled_token';
    const RECURRENCE_TOKEN = 'recurrence_token';
    const GENERATE_PAYMENT_TOKEN = 'generate_payment_token';
    const GENERATE_RECURRENCE_TOKEN = 'generate_recurrence_token';
    const GENERATE_UNSCHEDULED_TOKEN = 'generate_unscheduled_token';
    const CARDHOLDER = 'cardholder';
    const RISK_INDICATOR = 'risk_indicator';

    /**
     * @return PricesCollection
     */
    public function getPrices();

    /**
     * @param PricesCollection|array $prices
     * @return $this
     */
    public function setPrices($prices);

    /**
     * @return string
     */
    public function getPaymentToken();

    /**
     * @param string $paymentToken
     * @return $this
     */
    public function setPaymentToken($paymentToken);

    /**
     * @return string
     */
    public function getUnscheduledToken();

    /**
     * @param string $paymentToken
     * @return $this
     */
    public function setUnscheduledToken($paymentToken);

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
     * @return string
     */
    public function getRecurrenceToken();

    /**
     * @param string $recurrenceToken
     * @return $this
     */
    public function setRecurrenceToken($recurrenceToken);

    /**
     * @return bool
     */
    public function isGenerateUnscheduledToken();

    /**
     * @param bool $flag
     * @return $this
     */
    public function setGenerateUnscheduledToken($flag);

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

    /**
     * @return PaymentCardholderInterface
     */
    public function getCardholder();

    /**
     * @param PaymentCardholderInterface $cardholder
     * @return $this
     */
    public function setCardholder($cardholder);

    /**
     * @return PaymentRiskIndicatorInterface
     */
    public function getRiskIndicator();

    /**
     * @param PaymentRiskIndicatorInterface $riskIndicator
     * @return $this
     */
    public function setRiskIndicator($riskIndicator);
}
