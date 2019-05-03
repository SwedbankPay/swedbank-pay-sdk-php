<?php

namespace PayEx\Api\Service\Resource\Data;

use PayEx\Framework\Data\DataTransferObjectInterface;

interface RequestInterface extends DataTransferObjectInterface
{

    const OPERATION = 'operation';

    /**
     * @return string
     */
    public function getOperation();

    /**
     * @param $operation
     * @return string
     */
    public function setOperation($operation);
}
