<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

/**
 * Payment order payer interface
 *
 * @api
 */
interface PaymentorderPayerInterface extends ResourceInterface
{
    const CONSUMER_PROFILE_REF = 'consumer_profile_ref';

    /**
     * @return string
     */
    public function getConsumerProfileRef();

    /**
     * @param string $consumerProfileRef
     * @return $this
     */
    public function setConsumerProfileRef($consumerProfileRef);
}
