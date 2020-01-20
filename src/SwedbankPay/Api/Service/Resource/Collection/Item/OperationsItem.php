<?php

namespace SwedbankPay\Api\Service\Resource\Collection\Item;

use SwedbankPay\Api\Service\Resource\Collection\Item\Data\OperationsItemInterface;
use SwedbankPay\Framework\DataObjectCollectionItem;

/**
 * Consumer data object
 */
class OperationsItem extends DataObjectCollectionItem implements OperationsItemInterface
{
    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->offsetGet(self::METHOD);
    }

    /**
     * @param string $method
     * @return $this
     */
    public function setMethod($method)
    {
        return $this->offsetSet(self::METHOD, $method);
    }

    /**
     * @return string
     */
    public function getRel()
    {
        return $this->offsetGet(self::REL);
    }

    /**
     * @param string $rel
     * @return $this
     */
    public function setRel($rel)
    {
        return $this->offsetSet(self::REL, $rel);
    }

    /**
     * @return string
     */
    public function getHref()
    {
        return $this->offsetGet(self::HREF);
    }

    /**
     * @param string $href
     * @return $this
     */
    public function setHref($href)
    {
        return $this->offsetSet(self::HREF, $href);
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->offsetGet(self::CONTENT_TYPE);
    }

    /**
     * @param string $contentType
     * @return $this
     */
    public function setContentType($contentType)
    {
        return $this->offsetSet(self::CONTENT_TYPE, $contentType);
    }
}
