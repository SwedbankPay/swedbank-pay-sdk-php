<?php

namespace SwedbankPay\Api\Service\Data;

use SwedbankPay\Framework\Data\SimpleDataObjectInterface;
use SwedbankPay\Api\Service\Resource\Data\ResponseInterface as ResponseResourceInterface;

interface ResponseInterface extends SimpleDataObjectInterface
{
    const REQUEST_SERVICE = 'request_service';
    const RESPONSE_RESOURCE = 'response_resource';

    /**
     * @return RequestInterface
     */
    public function getRequestService();

    /**
     * @param RequestInterface $requestService
     * @return $this
     */
    public function setRequestService($requestService);

    /**
     * @return ResponseResourceInterface
     */
    public function getResponseResource();

    /**
     * @param ResponseResourceInterface $responseResource
     * @return $this
     */
    public function setResponseResource($responseResource);

    /**
     * @return array|null
     */
    public function getResponseData();

    /**
     * Extract operation data by rel
     *
     * @param string $rel
     * @param string $key
     *
     * @return bool|string|array
     */
    public function getOperationByRel($rel, $key = '');
}
