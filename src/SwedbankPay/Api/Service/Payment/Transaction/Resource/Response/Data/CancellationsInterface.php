<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\TransactionListCollection;

interface CancellationsInterface extends TransactionResourceInterface
{
    const CANCELLATION_LIST = 'cancellation_list';

    /**
    * @return TransactionListCollection
    */
    public function getCancellationList();
    
    /**
    * @param TransactionListCollection $cancellationList
    * @return $this
    */
    public function setCancellationList($cancellationList);
}
