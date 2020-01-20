<?php

namespace SwedbankPay\Api\Service\Resource\Data;

use SwedbankPay\Framework\Data\DataTransferObjectInterface;

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
