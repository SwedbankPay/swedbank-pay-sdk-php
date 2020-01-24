<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data;

interface CancellationObjectInterface extends TransactionResponseInterface
{
    const CANCELLATION = 'cancellation';

    /**
    * @return TransactionResourceInterface
    */
    public function getCancellation();
    
    /**
    * @param TransactionResourceInterface $cancellation
    * @return $this
    */
    public function setCancellation($cancellation);
}
