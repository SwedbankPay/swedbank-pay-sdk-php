<?php

namespace PayEx\Api\Service\Resource;

use PayEx\Api\Service\Resource;
use PayEx\Api\Service\Resource\Data\RequestInterface;

/**
 * Base Class for data request objects
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
class Request extends Resource implements RequestInterface
{
    /**
     * @return string
     */
    public function getOperation()
    {
        return $this->offsetGet(self::OPERATION);
    }

    /**
     * @param $operation
     * @return $this
     */
    public function setOperation($operation)
    {
        return $this->offsetSet(self::OPERATION, $operation);
    }
}
