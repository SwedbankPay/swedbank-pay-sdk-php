<?php

namespace SwedbankPay\Api\Service;

use SwedbankPay\Api\Service\Data\ResponseInterface;
use SwedbankPay\Api\Service\Resource\Data\ResponseInterface as ResponseResourceInterface;
use SwedbankPay\Framework\AbstractSimpleDataObject;

use SwedbankPay\Api\Service\Data\RequestInterface;
use SwedbankPay\Api\Service\Data\ResourceInterface;

use SwedbankPay\Api\Service\Resource\Data\RequestInterface as RequestResourceInterface;

use SwedbankPay\Api\Client\Client;
use SwedbankPay\Api\Client\Exception as ClientException;

/**
 * Base class for service requests
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
class Request extends AbstractSimpleDataObject implements RequestInterface
{
    /**
     * @var ResourceFactory
     **/
    protected $resourceFactory;

    /**
     * Request constructor.
     *
     * @param ResourceInterface|array|string|null $data
     * @throws ClientException
     */
    public function __construct($data = null)
    {
        parent::__construct();

        if (!($this->getClient() instanceof Client)) {
            $this->setClient(new Client());
        }

        if ($data instanceof Resource) {
            $this->setRequestResource($data);
        }

        if (is_array($data) || is_string($data)) {
            if (!($this->resourceFactory instanceof ResourceFactory)) {
                $this->resourceFactory = new ResourceFactory();
            }
            $this->setRequestResource($this->resourceFactory->newRequestResource($data));
        }

        if (method_exists($this, 'setup')) {
            $this->setup();
        }
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->offsetGet(self::CLIENT);
    }

    /**
     * @param Client $client
     * @return $this
     */
    public function setClient($client)
    {
        return $this->offsetSet(self::CLIENT, $client);
    }

    /**
     * @return string
     */
    public function getRequestMethod()
    {
        return $this->offsetGet(self::REQUEST_METHOD);
    }

    /**
     * @param string $requestMethod
     * @return $this
     */
    public function setRequestMethod($requestMethod)
    {
        return $this->offsetSet(self::REQUEST_METHOD, $requestMethod);
    }

    /**
     * @return string
     */
    public function getRequestEndpoint()
    {
        return $this->offsetGet(self::REQUEST_ENDPOINT);
    }

    /**
     * @param string $requestEndpoint
     * @return $this
     */
    public function setRequestEndpoint($requestEndpoint)
    {
        return $this->offsetSet(self::REQUEST_ENDPOINT, $requestEndpoint);
    }

    /**
     * @param mixed $args
     * @return Request
     */
    public function setRequestEndpointVars(...$args)
    {
        return $this->setRequestEndpoint(vsprintf($this->getRequestEndpoint(), $args));
    }

    /**
     * @return string
     */
    public function getServiceOperation()
    {
        $requestResource = $this->getRequestResource();

        if ($requestResource instanceof RequestResourceInterface &&
            method_exists($requestResource, 'getOperation')) {
            return $requestResource->getOperation();
        }

        return $this->offsetGet(self::SERVICE_OPERATION);
    }

    /**
     * @param string $serviceOperation
     * @return $this
     */
    public function setServiceOperation($serviceOperation)
    {
        $requestResource = $this->getRequestResource();

        if ($requestResource instanceof RequestResourceInterface &&
            method_exists($requestResource, 'setOperation')) {
            $requestResource->setOperation($serviceOperation);
            return $this;
        }

        return $this->offsetSet(self::SERVICE_OPERATION, $serviceOperation);
    }

    /**
     * @return RequestResourceInterface
     */
    public function getRequestResource()
    {
        return $this->offsetGet(self::REQUEST_RESOURCE);
    }

    /**
     * @param RequestResourceInterface|ResourceInterface $serviceResource
     * @return $this
     */
    public function setRequestResource($serviceResource)
    {
        return $this->offsetSet(self::REQUEST_RESOURCE, $serviceResource);
    }

    /**
     * @return ResponseResourceInterface|string
     */
    public function getResponseResourceFQCN()
    {
        return $this->offsetGet(self::RESPONSE_RESOURCE_FQCN);
    }

    /**
     * @param ResponseResourceInterface|string $responseResourceFQCN
     * @return $this
     */
    public function setResponseResourceFQCN($responseResourceFQCN)
    {
        return $this->offsetSet(self::RESPONSE_RESOURCE_FQCN, $responseResourceFQCN);
    }

    /**
     * @return array|null
     */
    public function getRequestData()
    {
        $requestResource = $this->getRequestResource();

        if (!($requestResource instanceof RequestResourceInterface)) {
            return null;
        }

        return $requestResource->__toArray();
    }

    /**
     * @return ResponseInterface
     * @throws ClientException
     */
    public function send()
    {
        if (!$this->getClient()->getMerchantToken() ||
            $this->getClient()->getMerchantToken() === '<merchant_token>') {
            throw new ClientException('MERCHANT_TOKEN not configured in INI file or environment variable.');
        }

        if (!$this->getClient()->getPayeeId() ||
            $this->getClient()->getPayeeId() === '<payee_id>') {
            throw new ClientException('PAYEE_ID not configured in INI file or environment variable.');
        }

        try {
            $responseBody = $this->getClient()->request(
                $this->getRequestMethod(),
                $this->getRequestEndpoint(),
                $this->getRequestResource()
            )->getResponseBody();

            /** @var ResponseInterface $serviceResponse */
            $serviceResponse = new Response($this, $responseBody);
        } catch (\Exception $exception) {
            throw new ClientException($exception->getMessage());
        }

        return $serviceResponse;
    }
}
