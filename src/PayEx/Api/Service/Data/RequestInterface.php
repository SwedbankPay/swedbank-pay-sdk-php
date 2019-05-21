<?php

namespace PayEx\Api\Service\Data;

use PayEx\Api\Client\Exception as ClientException;
use PayEx\Api\Service\Request;
use PayEx\Framework\Data\SimpleDataObjectInterface;
use PayEx\Api\Service\Resource\Data\RequestInterface as RequestResourceInterface;

interface RequestInterface extends SimpleDataObjectInterface
{
    const CLIENT = 'client';

    const REQUEST_METHOD = 'request_method';

    const REQUEST_ENDPOINT = 'request_endpoint';

    const REQUEST_RESOURCE = 'request_resource';

    const SERVICE_OPERATION = 'service_operation';

    /**
     * @return string
     */
    public function getClient();

    /**
     * @param string $client
     * @return $this
     */
    public function setClient($client);

    /**
     * @return string
     */
    public function getRequestMethod();

    /**
     * @param string $requestMethod
     * @return $this
     */
    public function setRequestMethod($requestMethod);

    /**
     * @return string
     */
    public function getRequestEndpoint();

    /**
     * @param string $requestEndpoint
     * @return $this
     */
    public function setRequestEndpoint($requestEndpoint);

    /**
     * @param mixed $args
     * @return Request
     */
    public function setRequestEndpointVars(...$args);

    /**
     * @return RequestResourceInterface
     */
    public function getRequestResource();

    /**
     * @param RequestResourceInterface $requestResource
     * @return $this
     */
    public function setRequestResource($requestResource);

    /**
     * @return string
     */
    public function getServiceOperation();

    /**
     * @param string $serviceOperation
     * @return $this
     */
    public function setServiceOperation($serviceOperation);

    /**
     * @return array|null
     */
    public function getRequestData();

    /**
     * @return ResponseInterface
     * @throws ClientException
     */
    public function send();
}
