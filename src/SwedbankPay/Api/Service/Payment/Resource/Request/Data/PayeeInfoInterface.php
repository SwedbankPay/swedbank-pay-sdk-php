<?php

namespace SwedbankPay\Api\Service\Payment\Resource\Request\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

/**
 * Payee info interface
 *
 * @api
 */
interface PayeeInfoInterface extends ResourceInterface
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
