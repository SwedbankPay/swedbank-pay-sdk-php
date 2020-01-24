<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data;

interface SaleObjectInterface extends TransactionResponseInterface
{
    const SALE = 'sale';

    /**
    * @return TransactionResourceInterface
    */
    public function getSale();
    
    /**
    * @param TransactionResourceInterface $sale
    * @return $this
    */
    public function setSale($sale);
}
