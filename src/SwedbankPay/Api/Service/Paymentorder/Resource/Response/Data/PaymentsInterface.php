<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource\Response\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

/**
 * Payments interface
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
