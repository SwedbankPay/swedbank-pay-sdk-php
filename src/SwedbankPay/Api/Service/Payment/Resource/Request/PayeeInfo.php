<?php

namespace SwedbankPay\Api\Service\Payment\Resource\Request;

use SwedbankPay\Api\Service\Payment\Resource\Request\Data\PayeeInfoInterface;
use SwedbankPay\Api\Service\Resource;

/**
 * Payee info data object
 */
class PayeeInfo extends Resource implements PayeeInfoInterface
{

    /**
     * @return string
     */
    public function getPayeeId()
    {
        return $this->offsetGet(self::PAYEE_ID);
    }

    /**
     * @param string $payeeId
     * @return $this
     */
    public function setPayeeId($payeeId)
    {
        return $this->offsetSet(self::PAYEE_ID, $payeeId);
    }

    /**
     * @return string
     */
    public function getPayeeReference()
    {
        return $this->offsetGet(self::PAYEE_REFERENCE);
    }

    /**
     * @param string $payeeReference
     * @return $this
     */
    public function setPayeeReference($payeeReference)
    {
        return $this->offsetSet(self::PAYEE_REFERENCE, $payeeReference);
    }

    /**
     * @return string
     */
    public function getPayeeName()
    {
        return $this->offsetGet(self::PAYEE_NAME);
    }

    /**
     * @param string $payeeName
     * @return $this
     */
    public function setPayeeName($payeeName)
    {
        return $this->offsetSet(self::PAYEE_NAME, $payeeName);
    }

    /**
     * @return string
     */
    public function getProductCategory()
    {
        return $this->offsetGet(self::PRODUCT_CATEGORY);
    }

    /**
     * @param string $productCategory
     * @return $this
     */
    public function setProductCategory($productCategory)
    {
        return $this->offsetSet(self::PRODUCT_CATEGORY, $productCategory);
    }

    /**
     * @return string
     */
    public function getOrderReference()
    {
        return $this->offsetGet(self::ORDER_REFERENCE);
    }

    /**
     * @param string $orderReference
     * @return $this
     */
    public function setOrderReference($orderReference)
    {
        return $this->offsetSet(self::ORDER_REFERENCE, $orderReference);
    }
}
