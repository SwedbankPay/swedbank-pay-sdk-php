<?php

namespace SwedbankPay\Api\Service\Paymentorder\Resource;

use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderCampaignInvoiceInterface;
use SwedbankPay\Api\Service\Resource;

/**
 * Payment order campaign invoice data object
 */
class PaymentorderCampaignInvoice extends Resource implements PaymentorderCampaignInvoiceInterface
{

    /**
     * @return string
     */
    public function getCampaignCode()
    {
        return $this->offsetGet(self::CAMPAIGN_CODE);
    }

    /**
     * @param string $campaignCode
     * @return $this
     */
    public function setCampaignCode($campaignCode)
    {
        return $this->offsetSet(self::CAMPAIGN_CODE, $campaignCode);
    }

    /**
     * @return int
     */
    public function getFeeAmount()
    {
        return $this->offsetGet(self::FEE_AMOUNT);
    }

    /**
     * @param int $feeAmount
     * @return $this
     */
    public function setFeeAmount($feeAmount)
    {
        return $this->offsetSet(self::FEE_AMOUNT, $feeAmount);
    }
}
