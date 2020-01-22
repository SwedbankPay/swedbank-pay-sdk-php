<?php

namespace SwedbankPay\Api\Service\Resource\Collection\Item\Data;

use SwedbankPay\Framework\Data\DataObjectCollectionItemInterface;

/**
 * Consumer national identifier data interface
 *
 * @api
 */
interface OperationsItemInterface extends DataObjectCollectionItemInterface
{
    const METHOD = 'method';
    const REL = 'rel';
    const HREF = 'href';
    const CONTENT_TYPE = 'content_type';

    /**
     * @return string
     */
    public function getMethod();

    /**
     * @param string $method
     * @return $this
     */
    public function setMethod($method);

    /**
 * @return string
 */
    public function getRel();

    /**
     * @param string $rel
     * @return $this
     */
    public function setRel($rel);

    /**
     * @return string
     */
    public function getHref();

    /**
     * @param string $href
     * @return $this
     */
    public function setHref($href);

    /**
     * @return string
     */
    public function getContentType();

    /**
     * @param string $contentType
     * @return $this
     */
    public function setContentType($contentType);
}
