<?php
// phpcs:ignoreFile

namespace SwedbankPay\Api;

use SwedbankPay\Api\Client\Exception;
use SwedbankPay\Api\Response;

/**
 * Class Client
 * @note For backward compatibility for previous versions
 * @deprecated Use SwedbankPay\Api\Client\Client instead of
 * @package SwedbankPay\Api
 * @SuppressWarnings(PHPMD.CamelCasePropertyName)
 */
class Client extends \SwedbankPay\Api\Client\Client
{
    const USER_AGENT = 'SwedbankPay HTTP Client';
    const VERSION = '2.0.1';
    const MODE_PRODUCTION = 'production';
    const MODE_TEST = 'test';

    /**
     * Curl Handler
     *
     * @var resource
     */
    protected $curl;

	/**
	 * @var string|null
	 */
    protected $last_response;

    /**
     * Merchant Token
     *
     * @var string
     */
    protected $merchant_token = '';

    /**
     * Test Mode
     *
     * @var string
     */
    protected $mode = 'test';

    /**
     * Api Endpoint
     *
     * @var string
     */
    protected $api_endpoint = 'https://api.externalintegration.payex.com';

    /**
     * Platform String
     *
     * @var string
     */
    protected $platform = '';

    /**
     * Client constructor.
     */
    public function __construct()
    {
        $this->curl = curl_init();
        curl_setopt_array($this->curl, [
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_CAINFO         => $this->getSystemCaRootBundlePath(),
            CURLOPT_TIMEOUT        => 60
        ]);
    }

    /**
     * Get Version
     *
     * @return string
     */
    public function getVersion()
    {
        return self::VERSION;
    }

    /**
     * Set Merchant Token
     *
     * @param $merchant_token
     * @SuppressWarnings(PHPMD.CamelCaseVariableName)
     * @SuppressWarnings(PHPMD.CamelCasePropertyName)
     * @SuppressWarnings(PHPMD.CamelCaseParameterName)
     */
    public function setMerchantToken($merchant_token)
    {
        $this->merchant_token = $merchant_token;
    }

    /**
     * Get Merchant Token
     *
     * @return string
     */
    public function getMerchantToken()
    {
        return $this->merchant_token;
    }

    /**
     * Set Mode
     *
     * @param $mode
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
        $this->api_endpoint = 'https://api.externalintegration.payex.com';

        if ($this->mode === self::MODE_PRODUCTION) {
            $this->api_endpoint = 'https://api.payex.com';
        }
    }

    /**
     * Get Mode
     *
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Set Platform
     *
     * @param $platform
     */
    public function setPlatform($platform)
    {
        $this->platform = $platform;
    }

    /**
     * Get Platform
     *
     * @return string
     */
    public function getPlatform()
    {
        return $this->platform;
    }

	/**
	 * Get Last Response
	 *
	 * @return string|null
	 */
    public function getLastResponse()
    {
    	return $this->last_response;
    }

	/**
	 * Set Last Response
	 *
	 * @param $last_response
	 */
    public function setLastResponse($last_response)
    {
    	$this->last_response = $last_response;
    }

    /**
     * Do Request
     *
     * @param       $method
     * @param       $url
     * @param array $params
     *
     * @return array|mixed|object
     * @throws Exception
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @SuppressWarnings(PHPMD.Superglobals)
     * @SuppressWarnings(PHPMD.CamelCaseVariableName)
     */
    public function request($method, $url, $params = array())
    {
        if (mb_substr($url, 0, 1, 'UTF-8') === '/') {
            $url = $this->api_endpoint . $url;
        }

        $remote_addr = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';
        $session_id  = sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
        $user_agent  = sprintf("%s/%s PHP/%s %s",
            self::USER_AGENT,
            self::VERSION,
            phpversion(),
            $this->platform
        );

        $headers = [
            'Accept: application/json',
            'Session-Id: ' . $session_id,
            'Forwarded: ' . $remote_addr,
            'Authorization:  Bearer ' . $this->merchant_token,
            'Content-Type: application/json'
        ];

        curl_setopt_array($this->curl, [
            CURLOPT_USERAGENT     => $user_agent,
            CURLOPT_HTTPHEADER    => $headers,
            CURLOPT_URL           => $url,
            CURLOPT_CUSTOMREQUEST => $method
        ]);

        if (count($params) > 0) {
            $data      = json_encode($params, JSON_PRETTY_PRINT);
            $headers[] = 'Content-Length: ' . strlen($data);

            curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($this->curl, CURLOPT_HTTPHEADER, $headers);
        }

        $body = curl_exec($this->curl);
        $info = curl_getinfo($this->curl);
        $code = (int)($info['http_code'] / 100);

        // Set Last response
        $this->last_response = $body;

        switch ($code) {
            case 0:
                $error = curl_error($this->curl);
                $errno = curl_errno($this->curl);
                throw new Exception(sprintf('Error: %s. Code: %s.', $error, $errno));
            case 1:
                throw new Exception(sprintf('Invalid HTTP Code: %s', $info['http_code']));
            case 2:
            case 3:
                return new Response($body);
            case 4:
            case 5:
                throw new Exception(sprintf('API Error: %s. HTTP Code: %s', $body, $info['http_code']));
            default:
                throw new Exception(sprintf('Invalid HTTP Code: %s', $info['http_code']));
        }
    }

    /**
     * GET Request
     *
     * @param $url
     *
     * @return array|mixed|object
     * @throws Exception
     */
    public function get($url)
    {
        return $this->request('GET', $url);
    }

    /**
     * DELETE Request
     *
     * @param $url
     *
     * @return array|mixed|object
     * @throws Exception
     */
    public function delete($url)
    {
        return $this->request('DELETE', $url);
    }

    /**
     * POST Request
     *
     * @param       $url
     * @param array $params
     *
     * @return array|mixed|object
     * @throws Exception
     */
    public function post($url, $params = array())
    {
        return $this->request('POST', $url, $params);
    }

    /**
     * PUT Request
     *
     * @param       $url
     * @param array $params
     *
     * @return array|mixed|object
     * @throws Exception
     */
    public function put($url, $params = array())
    {
        return $this->request('PUT', $url, $params);
    }

    /**
     * PATCH Request
     *
     * @param       $url
     * @param array $params
     *
     * @return array|mixed|object
     * @throws Exception
     */
    public function patch($url, $params = array())
    {
        return $this->request('PATCH', $url, $params);
    }

	/**
	 * Returns the system CA bundle path, or a path to the bundled one
	 *
	 * This method was adapted from Sslurp.
	 * https://github.com/EvanDotPro/Sslurp
	 *
	 * (c) Evan Coury <me@evancoury.com>
	 *
	 * For the full copyright and license information, please see below:
	 *
	 * Copyright (c) 2013, Evan Coury
	 * All rights reserved.
	 *
	 * Redistribution and use in source and binary forms, with or without modification,
	 * are permitted provided that the following conditions are met:
	 *
	 *     * Redistributions of source code must retain the above copyright notice,
	 *       this list of conditions and the following disclaimer.
	 *
	 *     * Redistributions in binary form must reproduce the above copyright notice,
	 *       this list of conditions and the following disclaimer in the documentation
	 *       and/or other materials provided with the distribution.
	 *
	 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
	 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
	 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
	 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
	 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
	 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
	 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
	 * ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
	 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
	 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
	 *
	 * @return string          path to a CA bundle file or directory
	 */
	private function getSystemCaRootBundlePath()
	{
		// If SSL_CERT_FILE env variable points to a valid certificate/bundle, use that.
		// This mimics how OpenSSL uses the SSL_CERT_FILE env variable.
		$caPath = getenv('SSL_CERT_FILE');
		if (@is_readable($caPath)) {
			return $caPath;
		}

		$caPath = ini_get('curl.cainfo');
		if (@is_readable($caPath)) {
			return $caPath;
		}

		$caPath = ini_get('openssl.cafile');
		if (@is_readable($caPath)) {
			return $caPath;
		}

		$caBundlePaths = [
			// Fedora, RHEL, CentOS (ca-certificates package)
			'/etc/pki/tls/certs/ca-bundle.crt',
			// Debian, Ubuntu, Gentoo, Arch Linux (ca-certificates package)
			'/etc/ssl/certs/ca-certificates.crt',
			// SUSE, openSUSE (ca-certificates package)
			'/etc/ssl/ca-bundle.pem',
			// FreeBSD (ca_root_nss_package)
			'/usr/local/share/certs/ca-root-nss.crt',
			// Cygwin
			'/usr/ssl/certs/ca-bundle.crt',
			// OS X macports, curl-ca-bundle package
			'/opt/local/share/curl/curl-ca-bundle.crt',
			// Default cURL CA bunde path (without --with-ca-bundle option)
			'/usr/local/share/curl/curl-ca-bundle.crt',
			// Really old RedHat?
			'/usr/share/ssl/certs/ca-bundle.crt',
			// OpenBSD
			'/etc/ssl/cert.pem',
			// FreeBSD 10.x
			'/usr/local/etc/ssl/cert.pem',
			// OS X homebrew, openssl package
			'/usr/local/etc/openssl/cert.pem',
			// SLES 12 (provided by the ca-certificates package)
			'/var/lib/ca-certificates/ca-bundle.pem',
			// OS X provided by homebrew (using the default path)
			'/usr/local/etc/openssl/cert.pem',
			// Google app engine
			'/etc/ca-certificates.crt',
			// Windows?
			'C:\\windows\\system32\\curl-ca-bundle.crt',
			'C:\\windows\\curl-ca-bundle.crt',
		];

		foreach ($caBundlePaths as $caPath) {
			if (@is_readable($caPath)) {
				return $caPath;
			}
		}

		return __DIR__ . DIRECTORY_SEPARATOR .  'Client' . DIRECTORY_SEPARATOR . 'cacert.pem';
	}
}
