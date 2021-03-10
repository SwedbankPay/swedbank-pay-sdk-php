<?php

namespace SwedbankPay\Test\Unit\Helper;

class SampleResponseHelper
{
    /**
     * @param string|null $fileName
     * @return string
     */
    public function getSampleResponse(string $fileName = null): string
    {
        $fileName = $fileName ?? 'samplePaymentResponse.json';

        return file_get_contents(__DIR__ . '/' . $fileName);
    }
}
