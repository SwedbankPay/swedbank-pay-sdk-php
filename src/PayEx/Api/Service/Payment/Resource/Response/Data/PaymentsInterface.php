<?php

namespace PayEx\Api\Service\Payment\Resource\Response\Data;

use PayEx\Api\Service\Data\ResourceInterface;

/**
 * Payment interface
 *
 * @api
 */
interface PaymentsInterface extends ResourceInterface
{
    const ID = 'id';
    const PAYMENT_LIST = 'payment_list';

    /**
     * @return string
     */
    public function getId();

    /**
     * @param string $paymentId
     * @return $this
     */
    public function setId($paymentId);

    /**
     * @return array
     */
    public function getPaymentList();

    /**
     * @param array $paymentList
     * @return $this
     */
    public function setPaymentList($paymentList);
}
