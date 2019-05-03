<?php

namespace PayEx\Api\Service\Transaction\Resource\Response\Data;

use PayEx\Api\Service\Resource\Data\ResponseInterface;

/**
 * Transaction capture response data interface
 *
 * @api
 */
interface TransactionCaptureInterface extends ResponseInterface
{
    const PAYMENT = 'payment';
    const CAPTURE = 'capture';

    /**
     * @return string
     */
    public function getPayment();

    /**
     * @param string $payment
     * @return $this
     */
    public function setPayment($payment);

    /**
     * @return CaptureInterface
     */
    public function getCapture();

    /**
     * @param CaptureInterface $capture
     * @return $this
     */
    public function setCapture($capture);
}
