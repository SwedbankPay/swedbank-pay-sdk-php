<?php

namespace PayEx;

class SocialSecurityNumberTest extends TestCase
{
    public function testSE()
    {
        $params = [
            'accountNumber' => '',
            'paymentMethod' => 'PXFINANCINGINVOICESE',
            'ssn' => '590719-5662',
            'zipcode' => '29620',
            'countryCode' => 'SE',
            'ipAddress' => '127.0.0.1'
        ];
        $result = $this->px->GetAddressByPaymentMethod($params);

        // Array Check
        $this->assertInternalType('array', $result);

        // Response Check
        $this->assertTrue($result['code'] === 'OK' && $result['description'] === 'OK' && $result['errorCode'] === 'OK');

        // Result Check
        $this->assertEquals('Eva Dagmar Christina Tannerdal', $result['name']);
        $this->assertEquals('Gunbritt Boden p12', $result['streetAddress']);
        $this->assertEquals('', $result['coAddress']);
        $this->assertEquals('29620', $result['zipCode']);
        $this->assertEquals('Småbyen', $result['city']);
        $this->assertEquals('SE', $result['countryCode']);
    }

    public function testNO()
    {
        $params = [
            'accountNumber' => '',
            'paymentMethod' => 'PXFINANCINGINVOICENO',
            'ssn' => '12067543937',
            'zipcode' => '3179',
            'countryCode' => 'NO',
            'ipAddress' => '127.0.0.1'
        ];
        $result = $this->px->GetAddressByPaymentMethod($params);

        // Array Check
        $this->assertInternalType('array', $result);

        // Response Check
        $this->assertTrue($result['code'] === 'OK' && $result['description'] === 'OK' && $result['errorCode'] === 'OK');

        // Result Check
        $this->assertEquals('Are Eriksen', $result['name']);
        $this->assertEquals('Strandsveien 560', $result['streetAddress']);
        $this->assertEquals('Ares coAddress', $result['coAddress']);
        $this->assertEquals('3179', $result['zipCode']);
        $this->assertEquals('Oslo', $result['city']);
        $this->assertEquals('NO', $result['countryCode']);
    }
}