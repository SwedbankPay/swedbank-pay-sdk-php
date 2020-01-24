<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\TransactionListCollection;

interface ReversalsInterface extends TransactionResourceInterface
{
    const REVERSAL_LIST = 'reversal_list';

    /**
    * @return TransactionListCollection
    */
    public function getReversalList();
    
    /**
    * @param TransactionListCollection $reversalList
    * @return $this
    */
    public function setReversalList($reversalList);
}
