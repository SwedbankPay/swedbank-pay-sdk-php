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
 * @SuppressWarnings(PHPMD.ExcessiveClassComplexity)
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
     * Get Payment Id endpoint of payment.
     *
     * @return string|null
     */
    public function getPaymentId()
    {
        return $this->offsetGet(self::PAYMENT_ID);
    }

    /**
     * Set Payment Id endpoint of payment.
     *
     * @param string $paymentId
     * @return $this
     */
    public function setPaymentId($paymentId)
    {
        return $this->offsetSet(self::PAYMENT_ID, $paymentId);
    }

    /**
     * Set Payment Order Id endpoint of payment.
     *
     * @param string $paymentOrderId
     * @return $this
     */
    public function setPaymentOrderId($paymentOrderId)
    {
        return $this->offsetSet(self::PAYMENT_ORDER_ID, $paymentOrderId);
    }

    /**
     * Get Payment Order Id endpoint of payment.
     *
     * @return string|null
     */
    public function getPaymentOrderId()
    {
        return $this->offsetGet(self::PAYMENT_ORDER_ID);
    }

    /**
     * Get the name of the relation the operation has to the current resource.
     *
     * @return string|null
     */
    public function getOperationRel()
    {
        return $this->offsetGet(self::OPERATION_REL);
    }

    /**
     * Set the name of the relation the operation has to the current resource.
     *
     * @param string $operationRel
     * @return $this
     */
    public function setOperationRel($operationRel)
    {
        return $this->offsetSet(self::OPERATION_REL, $operationRel);
    }

    /**
     * @return array
     */
    public function getExpands()
    {
        return $this->offsetGet(self::EXPANDS);
    }

    /**
     * @param array $expands
     * @return Request
     */
    public function setExpands($expands)
    {
        return $this->offsetSet(self::EXPANDS, $expands);
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
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @SuppressWarnings("ElseExpression")
     */
    public function send()
    {
        if (!$this->getClient()->getAccessToken() ||
            $this->getClient()->getAccessToken() === '<access_token>') {
            throw new ClientException('ACCESS_TOKEN not configured in INI file or environment variable.');
        }

        if (!$this->getClient()->getPayeeId() ||
            $this->getClient()->getPayeeId() === '<payee_id>') {
            throw new ClientException('PAYEE_ID not configured in INI file or environment variable.');
        }

        // Retrieve parameters of operation
        $paymentId = $this->getPaymentId();
        $paymentOrderId = $this->getPaymentOrderId();
        $operationRel = $this->getOperationRel();

        if (($paymentId || $paymentOrderId) && $operationRel) {
            // Fetch payment info
            $responseBody = $this->getClient()->request(
                'GET',
                $this->buildRequestEndpoint(),
                $this->getRequestResource()
            )->getResponseBody();

            /** @var ResponseInterface $response */
            $response = new Response($this, $responseBody);

            // Check fields
            if (in_array(
                $this->getOperationRel(),
                [
                    'sales',
                    'transactions',
                    'verifications',
                    'authorizations',
                    'captures',
                    'cancellations',
                    'reversals',
                    'urls',
                    'payeeInfo',
                    'metadata',
                    'payer',
                    'payments',
                    'current_payment'
                ]
            )) {
                // Configure request
                $responseData = $response->getResponseData();
                if (isset($responseData['payment'][$this->getOperationRel()])) {
                    $this->setRequestEndpoint($responseData['payment'][$this->getOperationRel()]['id']);
                } elseif (isset($responseData['payment_order'][$this->getOperationRel()])) {
                    $this->setRequestEndpoint($responseData['payment_order'][$this->getOperationRel()]['id']);
                } else {
                    throw new ClientException(sprintf('Field %s is unavailable', $this->getOperationRel()));
                }
            } else {
                // Apply operation options
                $operation = $response->getOperationByRel($this->getOperationRel());
                if (!$operation) {
                    throw new ClientException(sprintf('Operation %s is unavailable', $this->getOperationRel()));
                }

                // Configure request
                $this->setRequestMethod($operation['method']);
                $this->setRequestEndpoint($operation['href']);

                // Get rid of full url. There's should be an endpoint only.
                if (filter_var($operation['href'], FILTER_VALIDATE_URL)) {
                    // phpcs:disable
                    $parsed = parse_url($operation['href']);
                    // phpcs:enable
                    $url = $parsed['path'];
                    if (!empty($parsed['query'])) {
                        $url .= '?' . $parsed['query'];
                    }

                    $this->setRequestEndpoint($url);
                }
            }
        }

        try {
            $responseBody = $this->getClient()->request(
                $this->getRequestMethod(),
                $this->buildRequestEndpoint(),
                $this->getRequestResource()
            )->getResponseBody();

            /** @var ResponseInterface $serviceResponse */
            $serviceResponse = new Response($this, $responseBody);
        } catch (\Exception $exception) {
            throw new ClientException($exception->getMessage(), $exception->getCode());
        }

        return $serviceResponse;
    }

    /**
     * @return string|null
     */
    public function buildRequestEndpoint()
    {
        $endpoint = $this->getRequestEndpoint();

        if (!$endpoint && $this->getPaymentId()) {
            $endpoint = $this->getPaymentId();
        }

        if (!$endpoint && $this->getPaymentOrderId()) {
            $endpoint = $this->getPaymentOrderId();
        }

        if ($endpoint && $this->getExpands()) {
            $endpoint .= '?$expand=' . implode(',', $this->getExpands());
        }

        return $endpoint;
    }
}
