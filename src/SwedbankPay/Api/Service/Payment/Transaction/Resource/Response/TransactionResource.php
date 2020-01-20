<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionResourceInterface;
use SwedbankPay\Api\Service\Resource;

/**
 * Class TransactionResource
 * @package SwedbankPay\Api\Service\Payment\Transaction\Resource\Response
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
class TransactionResource extends Resource implements TransactionResourceInterface
{
    /**
     * @return string
     */
    public function getId()
    {
        return $this->offsetGet(self::ID);
    }

    /**
     * @param string $resourceId
     * @return $this
     */
    public function setId($resourceId)
    {
        $this->offsetSet(self::ID, $resourceId);
        return $this;
    }
}
