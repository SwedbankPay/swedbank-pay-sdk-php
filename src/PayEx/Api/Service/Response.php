<?php

namespace PayEx\Api\Service;

use PayEx\Framework\AbstractSimpleDataObject;
use PayEx\Framework\Data\DataObjectCollectionInterface;

use PayEx\Api\Service\Data\ResponseInterface;
use PayEx\Api\Service\Resource\Data\ResponseInterface as ResponseResourceInterface;
use PayEx\Api\Service\Resource\Collection\Item\Data\OperationsItemInterface;

/**
 * Class Response
 * @package PayEx\Api\Client
 */
class Response extends AbstractSimpleDataObject implements ResponseInterface
{
    /**
     * @var ResourceFactory
     */
    protected $resourceFactory;

    /**
     * Response constructor
     *
     * @param Request $request
     * @param Response|array|string|null $data
     */
    public function __construct($request, $data = [])
    {
        parent::__construct();

        $this->setRequestService($request);

        if ($data instanceof ResponseResourceInterface) {
            $this->setResponseResource($data);
            return;
        }

        if (is_array($data) || is_string($data)) {
            if (!($this->resourceFactory instanceof ResourceFactory)) {
                $this->resourceFactory = new ResourceFactory();
            }

            $serviceFqcn = get_class($this->getRequestService());

            $serviceBaseName = substr($serviceFqcn, strlen(__NAMESPACE__) + 1);
            $serviceBaseName = substr($serviceBaseName, 0, strpos($serviceBaseName, '\\'));

            $requestBaseName = substr($serviceFqcn, strrpos($serviceFqcn, '\\')+1);

            $this->setResponseResource(
                $this->resourceFactory->newResponseResource(
                    $serviceBaseName,
                    $requestBaseName,
                    $data
                )
            );
        }
    }

    /**
     * @return Request
     */
    public function getRequestService()
    {
        return $this->offsetGet(self::REQUEST_SERVICE);
    }

    /**
     * @param Request $serviceRequest
     * @return $this
     */
    public function setRequestService($serviceRequest)
    {
        return $this->offsetSet(self::REQUEST_SERVICE, $serviceRequest);
    }

    /**
     * @return ResponseResourceInterface
     */
    public function getResponseResource()
    {
        return $this->offsetGet(self::RESPONSE_RESOURCE);
    }

    /**
     * @param ResponseResourceInterface $responseResource
     * @return $this
     */
    public function setResponseResource($responseResource)
    {
        return $this->offsetSet(self::RESPONSE_RESOURCE, $responseResource);
    }

    /**
     * @return array|null
     */
    public function getResponseData()
    {
        $responseResource = $this->getResponseResource();

        if (!($responseResource instanceof ResponseResourceInterface)) {
            return null;
        }

        return $responseResource->__toArray();
    }

    /**
     * Extract operation data by rel
     *
     * @param string $rel
     * @param string $key
     *
     * @return bool|mixed
     */
    public function getOperationByRel($rel, $key = '')
    {
        /** @var DataObjectCollectionInterface $operations */
        $operations = $this->getResponseResource()->getOperations();

        /** @var array $matchingOperations */
        $matchingOperations = $operations->getItemsByColumnFilter('rel', $rel);

        if (!is_array($matchingOperations)) {
            return false;
        }

        /** @var OperationsItemInterface $operation */
        $operation = array_shift($matchingOperations);

        if ($key != '') {
            return $operation->offsetGet($key);
        }

        return $operation->__toArray();
    }
}
