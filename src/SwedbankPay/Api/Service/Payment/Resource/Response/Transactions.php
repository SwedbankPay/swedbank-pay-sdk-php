<?php


namespace SwedbankPay\Api\Service\Payment\Resource\Response;

use SwedbankPay\Api\Service\Payment\Resource\Response\Data\PaymentTransactionsInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\TransactionListCollection;
use SwedbankPay\Api\Service\Resource\Response as ResponseResource;

class Transactions extends ResponseResource implements PaymentTransactionsInterface
{

    /**
     * @return string
     */
    public function getId()
    {
        return $this->offsetGet(self::ID);
    }

    /**
     * @param string $resourceUri
     * @return $this
     */
    public function setId($resourceUri)
    {
        return $this->offsetSet(self::ID, $resourceUri);
    }

    /**
     * @return TransactionListCollection
     */
    public function getTransactionList()
    {
        return $this->offsetGet(self::TRANSACTION_LIST);
    }

    /**
     * @param TransactionListCollection|array $transactionList
     * @return $this
     */
    public function setTransactionList($transactionList)
    {
        if (!($transactionList instanceof TransactionListCollection)) {
            $transactionList = new TransactionListCollection($transactionList);
        }

        return $this->offsetSet(self::TRANSACTION_LIST, $transactionList);
    }
}
