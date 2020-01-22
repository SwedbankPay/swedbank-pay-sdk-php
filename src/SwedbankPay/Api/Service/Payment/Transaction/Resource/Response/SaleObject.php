<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\SaleObjectInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionResourceInterface;

class SaleObject extends TransactionResponse implements SaleObjectInterface
{
    /**
     * @return TransactionResourceInterface
     */
    public function getSale()
    {
        return $this->offsetGet(self::SALE);
    }

    /**
     * @param TransactionResourceInterface $sale
     * @return $this
     */
    public function setSale($sale)
    {
        $this->offsetSet(self::SALE, $sale);
        return $this;
    }
}
