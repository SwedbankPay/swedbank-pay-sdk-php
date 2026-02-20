<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource;

use SwedbankPay\Api\Service\Paymentorder\Resource\ClientInfo;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\ClientInfoInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Request\Data\PaymentorderInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderObjectInterface;
use SwedbankPay\Api\Service\Resource;

/**
 * Payment order object
 */
class PaymentorderObject extends Resource implements PaymentorderObjectInterface
{
	/**
	 * ClientInfo constructor.
	 * @param object|array|string $data
	 */
	public function __construct( $data = [] ) {
		parent::__construct( $data );
		$this->offsetSet( self::CLIENT_INFO, new ClientInfo() );
	}

    /**
     * @return PaymentorderInterface
     */
    public function getPaymentorder()
    {
        return $this->offsetGet(self::PAYMENTORDER);
    }

    /**
     * @param PaymentorderInterface $paymentorder
     * @return $this
     */
    public function setPaymentorder($paymentorder)
    {
        return $this->offsetSet(self::PAYMENTORDER, $paymentorder);
    }

	/**
	 * @return ClientInfoInterface
	 */
	public function getClientInfo() {
		return $this->offsetGet( self::CLIENT_INFO );
	}

	/**
	 * @param ClientInfoInterface $clientInfo
	 * @return $this
	 */
	public function setClientInfo( $clientInfo ) {
		return $this->offsetSet( self::CLIENT_INFO, $clientInfo );
	}
}
