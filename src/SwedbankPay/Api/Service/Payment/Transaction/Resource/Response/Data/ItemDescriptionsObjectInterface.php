<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data;

interface ItemDescriptionsObjectInterface
{
    const PAYMENT = 'payment';
    const TRANSACTION = 'transaction';
    const ITEM_DESCRIPTIONS = 'item_descriptions';

    /**
     * @return string
     */
    public function getPayment();

    /**
     * @param string $payment
     * @return $this
     */
    public function setPayment($payment);

    /**
     * @return string
     */
    public function getTransaction();

    /**
     * @param string $transaction
     * @return $this
     */
    public function setTransaction($transaction);

    /**
     * @return ItemDescriptionsInterface
     */
    public function getItemDescriptions();

    /**
     * @param ItemDescriptionsInterface $itemDescriptions
     * @return $this
     */
    public function setItemDescriptions($itemDescriptions);
}
