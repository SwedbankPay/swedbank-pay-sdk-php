<?php

namespace PayEx\Api\Service\Paymentorder\Resource\Data;

use PayEx\Api\Service\Data\ResourceInterface;

/**
 * Payment order payee info interface
 *
 * @api
 */
interface PaymentorderPayeeInfoInterface extends ResourceInterface
{
    const PAYEE_ID = 'payee_id';
    const PAYEE_REFERENCE = 'payee_reference';
    const PAYEE_NAME = 'payee_name';
    const PRODUCT_CATEGORY = 'product_category';
    const ORDER_REFERENCE = 'order_reference';

    /**
     * @return string
     */
    public function getPayeeId();

    /**
     * @param string $payeeId
     * @return $this
     */
    public function setPayeeId($payeeId);

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
     * @return string
     */
    public function getPayeeName();

    /**
     * @param string $payeeName
     * @return $this
     */
    public function setPayeeName($payeeName);

    /**
     * @return string
     */
    public function getProductCategory();

    /**
     * @param string $productCategory
     * @return $this
     */
    public function setProductCategory($productCategory);

    /**
     * @return string
     */
    public function getOrderReference();

    /**
     * @param string $orderReference
     * @return $this
     */
    public function setOrderReference($orderReference);
}
