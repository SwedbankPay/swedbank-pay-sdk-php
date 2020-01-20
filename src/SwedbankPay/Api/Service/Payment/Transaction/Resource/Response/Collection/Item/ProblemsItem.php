<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response\Collection\Item;

use PayEx\Api\Service\Payment\Transaction\Resource\Response\Collection\Item\Data\ProblemsItemInterface;
use PayEx\Framework\DataObjectCollectionItem;

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
