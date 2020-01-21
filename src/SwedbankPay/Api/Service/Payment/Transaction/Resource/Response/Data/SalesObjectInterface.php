<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data;

interface SalesObjectInterface extends TransactionsResponseInterface
{
    const SALES = 'sales';

    /**
    * @return string
    */
    public function getSales();
    
    /**
    * @param string $sales
    * @return $this
    */
    public function setSales($sales);
}
