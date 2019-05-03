<?php

namespace PayEx\Api\Service\Resource;

use PayEx\Api\Service\Resource;
use PayEx\Api\Service\Resource\Collection\OperationsCollection;
use PayEx\Api\Service\Resource\Data\ResponseInterface;

/**
 * Base Class for data response objects
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
class Response extends Resource implements ResponseInterface
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

        return $this->offsetSet(self::OPERATIONS, $operations);
    }
}
