<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data;

interface CancellationsObjectInterface
{
    const CANCELLATIONS = 'cancellations';

    /**
    * @return CancellationsInterface
    */
    public function getCancellations();
    
    /**
    * @param CancellationsInterface $cancellations
    * @return $this
    */
    public function setCancellations($cancellations);
}
