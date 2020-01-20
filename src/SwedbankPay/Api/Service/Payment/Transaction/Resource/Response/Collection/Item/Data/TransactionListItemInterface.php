<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response\Collection\Item\Data;

use PayEx\Api\Service\Payment\Transaction\Response\Data\TransactionInterface;
use PayEx\Api\Service\Resource\Collection\OperationsCollection;
use PayEx\Framework\Data\DataObjectCollectionItemInterface;

interface TransactionListItemInterface extends DataObjectCollectionItemInterface, TransactionInterface
{
    const OPERATIONS = 'operations';

    /**
     * @return OperationsCollection
     */
    public function getOperations();

    /**
     * @param OperationsCollection $operations
     * @return $this
     */
    public function setOperations($operations);
}
