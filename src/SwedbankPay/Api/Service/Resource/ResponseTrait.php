<?php

namespace SwedbankPay\Api\Service\Resource;

use SwedbankPay\Api\Service\Resource\Collection\OperationsCollection;

trait ResponseTrait
{
    /**
     * @return OperationsCollection
     */
    public function getOperations()
    {
        return $this->offsetGet(self::OPERATIONS);
    }

    /**
     * @param OperationsCollection|array $operations
     * @return $this
     */
    public function setOperations($operations)
    {
        if (!($operations instanceof OperationsCollection)) {
            $operations = new OperationsCollection($operations);
        }

        $this->offsetSet(self::OPERATIONS, $operations);
        return $this;
    }
}
