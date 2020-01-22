<?php

use SwedbankPay\Api\Service\Data\ResponseInterface;

use SwedbankPay\Api\Service\Consumer\Resource\ConsumerNationalIdentifier as ConsumerNationalIdentifierData;
use SwedbankPay\Api\Service\Consumer\Resource\Request\InitiateConsumerSession as ConsumerSessionRequestData;
use SwedbankPay\Api\Service\Consumer\Resource\Response\Data\InitiateConsumerSessionInterface as ConsumerSessionResponseData;

use SwedbankPay\Api\Service\Consumer\Request\InitiateConsumerSession;
use SwedbankPay\Api\Service\Resource\Collection\OperationsCollection as OperationsCollection;

class ConsumerTest extends TestCase
{
    /**
     * @var ResponseInterface $consumerSessionService
     */
    protected $consumerSessionService;

    /**
     * @param bool $noTest
     * @throws \SwedbankPay\Api\Client\Exception
     */
    public function testInitiateConsumerSession($noTest = false)
    {
        if (!($this->consumerSessionService instanceof ResponseInterface)) {
            $consumerSessionData = new ConsumerSessionRequestData();
            $consumerSessionData->setMsisdn('+4798765432')
                ->setEmail('olivia.nyhuus@example.com')
                ->setConsumerCountryCode('NO');

            $nationalIdentifierData = new ConsumerNationalIdentifierData();
            $nationalIdentifierData->setSocialSecurityNumber('26026708248')
                ->setCountryCode('NO');

            $consumerSessionData->setNationalIdentifier($nationalIdentifierData);

            $consumerSessionRequest = new InitiateConsumerSession($consumerSessionData);
            $consumerSessionRequest->setClient($this->client);

            $this->consumerSessionService = $consumerSessionRequest->send();
        }

        if ($noTest) {
            return;
        }

        $this->assertInstanceOf(ResponseInterface::class, $this->consumerSessionService);

        /** @var ConsumerSessionResponseData $response */
        $response = $this->consumerSessionService->getResponseResource();

        $this->assertInstanceOf(ConsumerSessionResponseData::class, $response);

        $this->assertTrue($response->getToken() != '');

        /** @var OperationsCollection $operations */
        $operations = $response->getOperations();

        $this->assertInstanceOf(OperationsCollection::class, $operations);

        $this->assertTrue(is_array($operations->getItems()));
        $this->assertTrue(count($operations->getItems()) > 0);
    }
}
