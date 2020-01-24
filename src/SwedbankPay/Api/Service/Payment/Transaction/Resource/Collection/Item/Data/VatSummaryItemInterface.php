<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item\Data;

interface VatSummaryItemInterface
{
    const AMOUNT = 'amount';
    const VAT_PERCENT = 'vat_percent';
    const VAT_AMOUNT = 'vat_amount';

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
    public function getVatPercent();
    
    /**
    * @param int $vatPercent
    * @return $this
    */
    public function setVatPercent($vatPercent);
    
    /**
    * @return int
    */
    public function getVatAmount();
    
    /**
    * @param int $vatAmount
    * @return $this
    */
    public function setVatAmount($vatAmount);
}
