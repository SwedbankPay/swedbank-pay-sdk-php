<?php

namespace SwedbankPay\Api\Service\Payment\Resource\Request\Data;

use SwedbankPay\Api\Service\Payment\Resource\Data\PaymentInterface;

/**
 * Payment request resource interface
 *
 * @api
 */
interface PaymentRequestInterface extends PaymentInterface
{
    const PREFILL_INFO = 'prefill_info';
    const METADATA = 'metadata';
    const INITIATING_SYSTEM_AGENT = 'initiating_system_user_agent';


    /**
     * @return PrefillInfoInterface
     */
    public function getPrefillInfo();

    /**
     * @param PrefillInfoInterface $prefillInfo
     * @return $this
     */
    public function setPrefillInfo($prefillInfo);

    /**
     * Get Metadata can be used to store data associated to a payment.
     *
     * @return MetadataInterface
     */
    public function getMetadata();

    /**
     * Set Metadata can be used to store data associated to a payment.
     *
     * @param MetadataInterface $metadata
     * @return $this
     */
    public function setMetadata($metadata);
}
