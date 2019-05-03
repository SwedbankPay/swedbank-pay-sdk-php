<?php

namespace PayEx\Api\Service\Paymentorder\Resource\Collection\Item\Data;

use PayEx\Framework\Data\DataObjectCollectionItemInterface;

use PayEx\Api\Service\Paymentorder\Resource\Data\PaymentorderCampaignInvoiceInterface;
use PayEx\Api\Service\Paymentorder\Resource\Data\PaymentorderCreditCardInterface;
use PayEx\Api\Service\Paymentorder\Resource\Data\PaymentorderInvoiceInterface;
use PayEx\Api\Service\Paymentorder\Resource\Data\PaymentorderSwishInterface;

/**
 * Payment order items interface
 *
 * @api
 */
interface PaymentorderItemInterface extends DataObjectCollectionItemInterface
{
    const CREDIT_CARD = 'credit_card';
    const INVOICE = 'invoice';
    const CAMPAIGN_INVOICE = 'campaign_invoice';
    const SWISH = 'swish';

    /**
     * @return PaymentorderCreditCardInterface
     */
    public function getCreditCard();

    /**
     * @param PaymentorderCreditCardInterface $creditCard
     * @return $this
     */
    public function setCreditCard($creditCard);

    /**
     * @return PaymentorderInvoiceInterface
     */
    public function getInvoice();

    /**
     * @param PaymentorderInvoiceInterface $invoice
     * @return $this
     */
    public function setInvoice($invoice);

    /**
     * @return PaymentorderCampaignInvoiceInterface
     */
    public function getCampaignInvoice();

    /**
     * @param PaymentorderCampaignInvoiceInterface $campaignInvoice
     * @return $this
     */
    public function setCampaignInvoice($campaignInvoice);

    /**
     * @return PaymentorderSwishInterface
     */
    public function getSwish();

    /**
     * @param PaymentorderSwishInterface $swish
     * @return $this
     */
    public function setSwish($swish);
}
