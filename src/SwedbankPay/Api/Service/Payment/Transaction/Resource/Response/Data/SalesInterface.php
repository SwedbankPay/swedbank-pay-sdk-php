<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response\Data;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Collection\TransactionListCollection;

interface SalesInterface extends TransactionResourceInterface
{
    const SALE_LIST = 'sale_list';

    /**
    * @return TransactionListCollection
    */
    public function getSaleList();

    /**
    * @param TransactionListCollection $saleList
    * @return $this
    */
    public function setSaleList($saleList);
}
