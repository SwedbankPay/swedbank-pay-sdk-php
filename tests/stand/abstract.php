<?php
// phpcs:ignoreFile -- this is test

use SwedbankPay\Api\Client\Client;

abstract class Stand
{
    /** @var Client $client */
    protected $client;

    /**
     * @return Client
     * @throws \SwedbankPay\Api\Client\Exception
     */
    protected function getClient()
    {
        $this->client = new Client();
        $this->client->setAccessToken(ACCESS_TOKEN)
            ->setPayeeId(PAYEE_ID)
            ->setMode(Client::MODE_TEST);

        return $this->client;
    }

    /**
     * @param $length
     * @return bool|string
     */
    protected function generateRandomString($length)
    {
        return substr(str_shuffle(md5(time())), 0, $length);
    }

    /**
     * @param string $config_file
     * @param string $section
     * @param string $key
     * @param string $value
     */
    protected function configSet($file, $section, $key, $value)
    {
        // phpcs:disable
        $data = [];
        if (file_exists($file)) {
            $data = parse_ini_file($file, true);
        }

        if (!isset($data[$section])) {
            $data[$section] = [];
        }

        $data[$section][$key] = $value;

        $content = '';
        foreach ($data as $section => $sectionContent) {
            $sectionContent = array_map(function ($value, $key) {
                return "$key = $value";
            }, array_values($sectionContent), array_keys($sectionContent));

            $sectionContent = implode("\n", $sectionContent);
            $content .= "[$section]\n$sectionContent\n";
        }

        file_put_contents($file, $content);
        // phpcs:enable
    }

    /**
     * Do API Request
     *
     * @param       $method
     * @param       $url
     * @param array $params
     *
     * @return array
     * @throws \Exception
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     */
    public function request($method, $url, $params = [])
    {
        // Get rid of full url. There's should be an endpoint only.
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            $parsed = parse_url($url); // phpcs: ignore
            $url = $parsed['path'];
            if (!empty($parsed['query'])) {
                $url .= '?' . $parsed['query'];
            }
        }

        if (empty($url)) {
            throw new \Exception('Invalid url');
        }

        // Process params
        array_walk_recursive($params, function (&$input) {
            if (is_object($input) && method_exists($input, 'toArray')) {
                $input = $input->toArray();
            }
        });

        try {
            /** @var \SwedbankPay\Api\Response $response */
            $client = $this->getClient()->request($method, $url, $params);

            //$codeClass = (int)($this->client->getResponseCode() / 100);
            $responseBody = $client->getResponseBody();
            return json_decode($responseBody, true);

        } catch (\SwedbankPay\Api\Client\Exception $e) {
            $httpCode = (int)$this->client->getResponseCode();

            // https://tools.ietf.org/html/rfc7807
            $data = json_decode($this->client->getResponseBody(), true);
            if (json_last_error() === JSON_ERROR_NONE &&
                isset($data['title']) &&
                isset($data['detail'])
            ) {
                // Format error message
                $message = sprintf('%s. %s', $data['title'], $data['detail']);

                // Get details
                if (isset($data['problems'])) {
                    $detailed = '';
                    $problems = $data['problems'];
                    foreach ($problems as $problem) {
                        $detailed .= sprintf('%s: %s', $problem['name'], $problem['description']) . "\r\n";
                    }

                    if (!empty($detailed)) {
                        $message .= "\r\n" . $detailed;
                    }
                }

                throw new \Exception($message, $httpCode, null);
            }

            throw new \Exception('API Exception. Please check logs');
        }
    }

    /**
     * Extract operation value from operations list
     *
     * @param array $data
     * @param string $rel
     * @param bool $single
     *
     * @return bool|string|array
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     * @SuppressWarnings(PHPMD.UnusedLocalVariable)
     */
    public function getOperationByRel(array $data, $rel, $single = true)
    {
        if (!isset($data['operations'])) {
            return false;
        }

        $operations = $data['operations'];
        $operation = array_filter($operations, function ($value) use ($rel) {
            return (is_array($value) && $value['rel'] === $rel);
        }, ARRAY_FILTER_USE_BOTH);

        if (count($operation) > 0) {
            $operation = array_shift($operation);

            return $single ? $operation['href'] : $operation;
        }

        return false;
    }
}
