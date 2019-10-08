<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response\Data;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Collection\ItemDescriptionListCollection;
use PayEx\Api\Service\Payment\Transaction\Resource\Response\Collection\VatSummaryCollection;

interface ItemDescriptionsInterface extends TransactionResourceInterface
{
    const ITEM_DESCRIPTION_LIST = 'item_description_lists';
    const VAT_SUMMARY = 'vat_summary';

    /**
    * @return ItemDescriptionListCollection
    */
    public function getItemDescriptionList();

    /**
    * @param ItemDescriptionListCollection $itemDescriptionList
    * @return $this
    */
    public function setItemDescriptionList($itemDescriptionList);

    /**
    * @return VatSummaryCollection
    */
    public function getVatSummary();

    /**
    * @param VatSummaryCollection $vatSummary
    * @return $this
    */
    public function setVatSummary($vatSummary);
}
