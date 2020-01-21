<?php

namespace SwedbankPay\Api\Service\Resource\Data;

use SwedbankPay\Framework\Data\DataTransferObjectInterface;
use SwedbankPay\Framework\Data\DataObjectCollectionInterface;

interface ResponseInterface extends DataTransferObjectInterface
{

    const OPERATIONS = 'operations';

    /**
     * @return DataObjectCollectionInterface
     */
    public function getOperations();

    /**
     * @param DataObjectCollectionInterface $operations
     * @return $this
     */
    public function setOperations($operations);
}
