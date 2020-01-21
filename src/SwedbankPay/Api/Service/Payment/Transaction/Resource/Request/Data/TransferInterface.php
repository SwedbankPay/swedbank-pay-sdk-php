<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\Data;

use SwedbankPay\Api\Service\Resource\Data\RequestInterface;

/**
 * Transfer (Capture & Reversal) Interface
 *
 * @api
 */
interface TransferInterface extends RequestInterface
{
    const AMOUNT = 'amount';
    const VAT_AMOUNT = 'vat_amount';
    const DESCRIPTION = 'description';
    const PAYEE_REFERENCE = 'payee_reference';

    /**
     * @return int
     */
    public function getAmount();

    /**
     * @param int $amount
     * @return $this
     */
    public function setAmount($amount);

    /**
     * @return int
     */
    public function getVatAmount();

    /**
     * @param int $vatAmount
     * @return $this
     */
    public function setVatAmount($vatAmount);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description);

    /**
     * @return string
     */
    public function getPayeeReference();

    /**
     * @param $payeeReference
     * @return $this
     */
    public function setPayeeReference($payeeReference);
}
