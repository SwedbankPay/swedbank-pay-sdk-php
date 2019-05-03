<?php

namespace PayEx\Api\Service\Payment\Resource\Response;

use PayEx\Api\Service\Payment\Resource\Collection\PaymentListCollection;
use PayEx\Api\Service\Payment\Resource\Response\Data\PaymentsInterface;
use PayEx\Api\Service\Resource\Response;

/**
 * Payment data object
 */
class Payments extends Response implements PaymentsInterface
{

    /**
     * @return string
     */
    public function getId()
    {
        return $this->offsetGet(self::ID);
    }

    /**
     * @param string $paymentId
     * @return $this
     */
    public function setId($paymentId)
    {
        return $this->offsetSet(self::ID, $paymentId);
    }

    /**
     * @return PaymentListCollection
     */
    public function getPaymentList()
    {
        return $this->offsetGet(self::PAYMENT_LIST);
    }

    /**
     * @param PaymentListCollection|array $paymentList
     * @return $this
     */
    public function setPaymentList($paymentList)
    {
        if (!($paymentList instanceof PaymentListCollection)) {
            $paymentList = new PaymentListCollection($paymentList);
        }

        return $this->offsetSet(self::PAYMENT_LIST, $paymentList);
    }
}
