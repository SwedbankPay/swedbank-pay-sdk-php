<?php

namespace SwedbankPay\Api\Service\Payment\Resource\Response\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\TransactionListCollection;

interface PaymentTransactionsInterface extends ResourceInterface
{
    const ID = 'id';
    const TRANSACTION_LIST = 'transaction_list';

    /**
     * @return string
     */
    public function getId();

    /**
     * @param string $resourceUri
     * @return $this
     */
    public function setId($resourceUri);

    /**
     * @return TransactionListCollection
     */
    public function getTransactionList();

    /**
     * @param TransactionListCollection|array $transactionList
     * @return $this
     */
    public function setTransactionList($transactionList);
}
