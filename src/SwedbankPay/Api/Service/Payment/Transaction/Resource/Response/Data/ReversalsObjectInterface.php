<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data;

interface ReversalsObjectInterface extends TransactionsResponseInterface
{
    const REVERSALS = 'reversals';

    /**
    * @return ReversalsInterface
    */
    public function getReversals();
    
    /**
    * @param ReversalsInterface $reversals
    * @return $this
    */
    public function setReversals($reversals);
}
