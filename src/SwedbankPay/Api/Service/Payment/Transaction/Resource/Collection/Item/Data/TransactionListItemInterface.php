<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item\Data;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionInterface;
use SwedbankPay\Api\Service\Resource\Collection\OperationsCollection;
use SwedbankPay\Framework\Data\DataObjectCollectionItemInterface;

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
