<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Request\Data;

use PayEx\Api\Service\Resource\Data\RequestInterface;

/**
 * Cancellation Interface
 *
 * @api
 */
interface CancellationInterface extends RequestInterface
{
    const DESCRIPTION = 'description';
    const PAYEE_REFERENCE = 'payee_reference';

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description);

    /**
     * @return string
     */
    public function getPayeeReference();

    /**
     * @param $payeeReference
     * @return $this
     */
    public function setPayeeReference($payeeReference);
}
