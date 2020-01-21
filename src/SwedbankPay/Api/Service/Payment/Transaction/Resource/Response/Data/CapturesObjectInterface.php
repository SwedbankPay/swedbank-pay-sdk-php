<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data;

interface CapturesObjectInterface extends TransactionsResponseInterface
{
    const CAPTURES = 'captures';

    /**
    * @return CapturesInterface
    */
    public function getCaptures();
    
    /**
    * @param CapturesInterface $captures
    * @return $this
    */
    public function setCaptures($captures);
}
