<?php

namespace PayEx\Api\Service\Resource\Data;

use PayEx\Framework\Data\DataTransferObjectInterface;
use PayEx\Framework\Data\DataObjectCollectionInterface;

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
