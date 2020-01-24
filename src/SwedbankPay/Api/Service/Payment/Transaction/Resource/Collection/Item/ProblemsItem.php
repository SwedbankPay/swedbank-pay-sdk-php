<?php

namespace SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\Item\Data\ProblemsItemInterface;
use SwedbankPay\Framework\DataObjectCollectionItem;

class ProblemsItem extends DataObjectCollectionItem implements ProblemsItemInterface
{
    /**
     * @return string
     */
    public function getName()
    {
        return $this->offsetGet(self::NAME);
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->offsetSet(self::NAME, $name);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->offsetGet(self::DESCRIPTION);
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->offsetSet(self::DESCRIPTION, $description);
        return $this;
    }
}
