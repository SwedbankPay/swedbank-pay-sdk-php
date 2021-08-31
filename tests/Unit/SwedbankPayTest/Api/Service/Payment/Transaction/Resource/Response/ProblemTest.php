<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Problem;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Collection\ProblemsCollection;

class ProblemTest extends TestCase
{
    public function testData()
    {
        $object = new Problem();

        $this->assertInstanceOf(
            Problem::class,
            $object->setType('test')
        );
        $this->assertEquals('test', $object->getType());

        $this->assertInstanceOf(
            Problem::class,
            $object->setTitle('test')
        );
        $this->assertEquals('test', $object->getTitle());

        $this->assertInstanceOf(
            Problem::class,
            $object->setStatus('test')
        );
        $this->assertEquals('test', $object->getStatus());

        $this->assertInstanceOf(
            Problem::class,
            $object->setDetail('test')
        );
        $this->assertEquals('test', $object->getDetail());

        $problems = new ProblemsCollection();
        $this->assertInstanceOf(
            Problem::class,
            $object->setProblems($problems)
        );
        $this->assertInstanceOf(ProblemsCollection::class, $object->getProblems());
    }
}
