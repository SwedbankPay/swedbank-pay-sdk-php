<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data;

interface ReversalObjectInterface extends TransactionResponseInterface
{
    const REVERSAL = 'reversal';

    /**
    * @return TransactionResourceInterface
    */
    public function getReversal();
    
    /**
    * @param TransactionResourceInterface $reversal
    * @return $this
    */
    public function setReversal($reversal);
}
