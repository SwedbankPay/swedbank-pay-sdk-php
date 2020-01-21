<?php

namespace SwedbankPay\Api\Service\Payment\Resource\Response\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;

/**
 * Payment order url interface
 *
 * @api
 */
interface PaymentResourceUriInterface extends ResourceInterface
{
    const ID = 'id';

    /**
     * @return string
     */
    public function getId();

    /**
     * @param string $resourceUri
     * @return $this
     */
    public function setId($resourceUri);
}
