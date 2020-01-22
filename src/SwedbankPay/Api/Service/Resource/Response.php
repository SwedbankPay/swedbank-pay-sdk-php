<?php

namespace SwedbankPay\Api\Service\Resource;

use SwedbankPay\Api\Service\Resource;
use SwedbankPay\Api\Service\Resource\Data\ResponseInterface;

/**
 * Base Class for data response objects
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
class Response extends Resource implements ResponseInterface
{
    use ResponseTrait;
}
