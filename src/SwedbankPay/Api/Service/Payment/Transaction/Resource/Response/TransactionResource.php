<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionResourceInterface;
use PayEx\Api\Service\Resource;

/**
 * Class TransactionResource
 * @package PayEx\Api\Service\Payment\Transaction\Resource\Response
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
