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
    const GENERATE_PAYMENT_TOKEN = 'generate_payment_token';
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
     * @return bool
     */
    public function isGeneratePaymentToken();

    /**
     * @param bool $generatePaymentToken
     * @return $this
     */
    public function setGeneratePaymentToken($generatePaymentToken);

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
