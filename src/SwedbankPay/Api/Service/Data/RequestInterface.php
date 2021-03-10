<?php

namespace SwedbankPay\Api\Service\Data;

use SwedbankPay\Api\Client\Exception as ClientException;
use SwedbankPay\Api\Service\Request;
use SwedbankPay\Framework\Data\SimpleDataObjectInterface;
use SwedbankPay\Api\Service\Resource\Data\RequestInterface as RequestResourceInterface;

interface RequestInterface extends SimpleDataObjectInterface
{
    const CLIENT = 'client';

    const REQUEST_METHOD = 'request_method';

    const REQUEST_ENDPOINT = 'request_endpoint';

    const REQUEST_RESOURCE = 'request_resource';

    const SERVICE_OPERATION = 'service_operation';

    /**
     * Endpoint of Payment Id
     */
    const PAYMENT_ID = 'payment_id';

    /**
     * Endpoint of Payment Order Id
     */
    const PAYMENT_ORDER_ID = 'payment_order_id';

    /**
     * The name of the relation the operation has to the current resource.
     */
    const OPERATION_REL = 'operation_rel';

    const EXPANDS = 'expands';

    const RESPONSE_RESOURCE_FQCN = 'response_resource_fqcn';

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
     * Get Payment Id endpoint of payment.
     *
     * @return string|null
     */
    public function getPaymentId();

    /**
     * Set Payment Id endpoint of payment.
     *
     * @param string $paymentId
     * @return $this
     */
    public function setPaymentId($paymentId);

    /**
     * Set Payment Order Id endpoint of payment.
     *
     * @param string $paymentOrderId
     * @return $this
     */
    public function setPaymentOrderId($paymentOrderId);

    /**
     * @return array
     */
    public function getExpands();

    /**
     * @param array $expands
     * @return $this
     */
    public function setExpands($expands);

    /**
     * Get Payment Order Id endpoint of payment.
     *
     * @return string|null
     */
    public function getPaymentOrderId();

    /**
     * Get the name of the relation the operation has to the current resource.
     *
     * @return string|null
     */
    public function getOperationRel();

    /**
     * Set the name of the relation the operation has to the current resource.
     *
     * @param string $operationRel
     * @return $this
     */
    public function setOperationRel($operationRel);

    /**
     * @return string
     */
    public function getResponseResourceFQCN();

    /**
     * @param string $responseResourceFQCN
     * @return $this
     */
    public function setResponseResourceFQCN($responseResourceFQCN);

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
