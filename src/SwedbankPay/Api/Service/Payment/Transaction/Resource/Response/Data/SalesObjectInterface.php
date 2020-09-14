<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data;

interface SalesObjectInterface
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
