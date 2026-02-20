<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource\Data;

use SwedbankPay\Api\Service\Data\ResourceInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Request\Data\PaymentorderInterface;

/**
 * Payment order object interface interface
 *
 * @api
 */
interface PaymentorderObjectInterface extends ResourceInterface
{
    const PAYMENTORDER = 'paymentorder';
	const CLIENT_INFO  = 'client_info';

    /**
     * @return PaymentorderInterface
     */
    public function getPaymentorder();

    /**
     * @param PaymentorderInterface $paymentorder
     * @return $this
     */
    public function setPaymentorder($paymentorder);

	/**
	 * @return ClientInfoInterface
	 */
	public function getClientInfo();

	/**
	 * @param ClientInfoInterface $clientInfo
	 * @return $this
	 */
	public function setClientInfo( $clientInfo );
}
