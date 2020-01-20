<?php

namespace PayEx\Api\Service\Paymentorder\Resource\Data;

use PayEx\Api\Service\Data\ResourceInterface;

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
