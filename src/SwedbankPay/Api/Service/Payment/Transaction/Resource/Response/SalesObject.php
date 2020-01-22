<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\SalesObjectInterface;

class SalesObject extends TransactionResponse implements SalesObjectInterface
{
    /**
     * @return string
     */
    public function getSales()
    {
        return $this->offsetGet(self::SALES);
    }

    /**
     * @param string $sales
     * @return $this
     */
    public function setSales($sales)
    {
        $this->offsetSet(self::SALES, $sales);
        return $this;
    }
}
