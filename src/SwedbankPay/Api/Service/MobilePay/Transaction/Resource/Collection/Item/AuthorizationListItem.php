<?php

namespace SwedbankPay\Api\Service\MobilePay\Transaction\Resource\Collection\Item;

use SwedbankPay\Api\Service\MobilePay\Transaction\Resource\Collection\Item\Data\AuthorizationListItemInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item\TransactionListItem;

class AuthorizationListItem extends TransactionListItem implements AuthorizationListItemInterface
{
    /**
     * @return string
     */
    public function getMobilePayTransactionId()
    {
        return $this->offsetGet(self::MOBILEPAY_TRANSACTION_ID);
    }

    /**
     * @param string $mobilePayTransactionId
     * @return $this
     */
    public function setMobilePayTransactionId($mobilePayTransactionId)
    {
        $this->offsetSet(self::MOBILEPAY_TRANSACTION_ID, $mobilePayTransactionId);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getMsisdn()
    {
        return $this->offsetGet(self::MSISDN);
    }

    /**
     * @param string $msisdn
     * @return $this
     */
    public function setMsisdn($msisdn)
    {
        $this->offsetSet(self::MSISDN, $msisdn);
        return $this;
    }
}
