<?php

namespace SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Request\Data;

use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\OrderItemsCollection;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Collection\ItemDescriptionCollection;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Collection\VatSummaryCollection;
use SwedbankPay\Api\Service\Resource\Data\RequestInterface;

/**
 * Transaction interface
 *
 * @api
 */
interface TransactionInterface extends RequestInterface
{
    const DESCRIPTION = 'description';
    const AMOUNT = 'amount';
    const VAT_AMOUNT = 'vat_amount';
    const PAYEE_REFERENCE = 'payee_reference';
    const ORDER_ITEMS = 'orderItems';
    const ITEM_DESCRIPTIONS = 'item_descriptions';
    const VAT_SUMMARY = 'vat_summary';

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description);

    /**
     * @return int
     */
    public function getAmount();

    /**
     * @param int $amount
     * @return $this
     */
    public function setAmount($amount);

    /**
     * @return int
     */
    public function getVatAmount();

    /**
     * @param int $vatAmount
     * @return $this
     */
    public function setVatAmount($vatAmount);

    /**
     * @return string
     */
    public function getPayeeReference();

    /**
     * @param string $payeeReference
     * @return $this
     */
    public function setPayeeReference($payeeReference);

    /**
     * @return OrderItemsCollection
     */
    public function getOrderItems();

    /**
     * @param OrderItemsCollection|array $orderItems
     * @return $this
     */
    public function setOrderItems($orderItems);

    /**
     * @return ItemDescriptionCollection
     */
    public function getItemDescriptions();

    /**
     * @param ItemDescriptionCollection|array $itemDescriptions
     * @return $this
     */
    public function setItemDescriptions($itemDescriptions);

    /**
     * @return VatSummaryCollection $this
     */
    public function getVatSummary();

    /**
     * @param VatSummaryCollection|array $vatSummary
     * @return $this
     */
    public function setVatSummary($vatSummary);
}
