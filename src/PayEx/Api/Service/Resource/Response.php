<?php

namespace PayEx\Api\Service\Resource;

use PayEx\Api\Service\Resource;
use PayEx\Api\Service\Resource\Data\ResponseInterface;

/**
 * Base Class for data response objects
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
class Response extends Resource implements ResponseInterface
{
    use ResponseTrait;
}
