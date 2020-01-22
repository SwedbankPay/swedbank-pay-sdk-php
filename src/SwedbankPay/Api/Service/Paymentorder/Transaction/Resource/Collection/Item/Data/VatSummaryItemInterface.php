<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Collection\Item\Data;

use SwedbankPay\Framework\Data\DataObjectCollectionItemInterface;

/**
 * Transaction vat summary interface
 *
 * @api
 */
interface VatSummaryItemInterface extends DataObjectCollectionItemInterface
{
    const AMOUNT = 'amount';
    const VAT_AMOUNT = 'vat_amount';
    const VAT_PERCENT = 'vat_percent';

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
     * @return int
     */
    public function getVatPercent();

    /**
     * @param int $vatPercent
     * @return $this
     */
    public function setVatPercent($vatPercent);
}
