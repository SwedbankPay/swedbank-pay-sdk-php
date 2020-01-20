<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response\Data;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Collection\TransactionListCollection;

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
