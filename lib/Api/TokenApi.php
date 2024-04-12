<?php
/**
 * TokenApi
 * PHP version 7.4
 *
 * @category Class
 * @package  WebnessStudio\MPL\OAuth
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * OAuth2
 *
 * Az alábbi eszköz szándékosan kihagyja az authorizációs végpontot, így biztosítva gyakorlási lehetőséget a token lekérésére. /  This document omits authorization endpoint on purpose, to provide a chance to practice obtaining an access token.  Idézet innen: / Quote from: [RFC 6749 - The OAuth2.0 Authorization Framework - 2.3.1. Client Password](https://tools.ietf.org/html/rfc6749#section-2.3.1): * Az api kulcsok (key, secret) használata a request-body-ban **NEM ENGEDÉLYEZETT**.    / Including the client credentials in the request-body using the two parameters is **NOT ALLOWED**. * A `grant_type=client_credentials` paraméter csak a request body-ban megengedett, **NEM LEHET** a request URI-ban.    / The parameter `grant_type=client_credentials` can only be transmitted in the request-body and **MUST NOT** be included in the request URI.  Az API a következő URL-eken érhető el: / This API can be accessed at the following URLs:  Környezet / Environment | API URL ----------------|------------- Sandbox | `https://sandbox.api.posta.hu/oauth2`  Production | `https://core.api.posta.hu/oauth2`   Az API ezen az oldalon a Sandbox környezetben tesztelhető. / You can test the API on this page in the Sandbox environment.
 *
 * The version of the OpenAPI document: 1.0
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.4.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace WebnessStudio\MPL\OAuth\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use WebnessStudio\MPL\OAuth\ApiException;
use WebnessStudio\MPL\OAuth\Configuration;
use WebnessStudio\MPL\OAuth\HeaderSelector;
use WebnessStudio\MPL\OAuth\ObjectSerializer;

/**
 * TokenApi Class Doc Comment
 *
 * @category Class
 * @package  WebnessStudio\MPL\OAuth
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class TokenApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'token' => [
            'application/x-www-form-urlencoded',
        ],
    ];

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation token
     *
     * Hozzáférési token beszerzése „client_credentials” engedéllyel. / Obtain access token with \&quot;client_credentials\&quot; grant.
     *
     * @param  string $grant_type Value **MUST** be set to \\\&quot;client_credentials\\\&quot;. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['token'] to see the possible values for this operation
     *
     * @throws \WebnessStudio\MPL\OAuth\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \WebnessStudio\MPL\OAuth\Model\Token|\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse|\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse|\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse|\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse|\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse|\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse|\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse
     */
    public function token($grant_type, string $contentType = self::contentTypes['token'][0])
    {
        list($response) = $this->tokenWithHttpInfo($grant_type, $contentType);
        return $response;
    }

    /**
     * Operation tokenWithHttpInfo
     *
     * Hozzáférési token beszerzése „client_credentials” engedéllyel. / Obtain access token with \&quot;client_credentials\&quot; grant.
     *
     * @param  string $grant_type Value **MUST** be set to \\\&quot;client_credentials\\\&quot;. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['token'] to see the possible values for this operation
     *
     * @throws \WebnessStudio\MPL\OAuth\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \WebnessStudio\MPL\OAuth\Model\Token|\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse|\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse|\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse|\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse|\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse|\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse|\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function tokenWithHttpInfo($grant_type, string $contentType = self::contentTypes['token'][0])
    {
        $request = $this->tokenRequest($grant_type, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\WebnessStudio\MPL\OAuth\Model\Token' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\WebnessStudio\MPL\OAuth\Model\Token' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\WebnessStudio\MPL\OAuth\Model\Token', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\WebnessStudio\MPL\OAuth\Model\Token';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WebnessStudio\MPL\OAuth\Model\Token',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WebnessStudio\MPL\OAuth\Model\ApiGatewayErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation tokenAsync
     *
     * Hozzáférési token beszerzése „client_credentials” engedéllyel. / Obtain access token with \&quot;client_credentials\&quot; grant.
     *
     * @param  string $grant_type Value **MUST** be set to \\\&quot;client_credentials\\\&quot;. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['token'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function tokenAsync($grant_type, string $contentType = self::contentTypes['token'][0])
    {
        return $this->tokenAsyncWithHttpInfo($grant_type, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation tokenAsyncWithHttpInfo
     *
     * Hozzáférési token beszerzése „client_credentials” engedéllyel. / Obtain access token with \&quot;client_credentials\&quot; grant.
     *
     * @param  string $grant_type Value **MUST** be set to \\\&quot;client_credentials\\\&quot;. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['token'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function tokenAsyncWithHttpInfo($grant_type, string $contentType = self::contentTypes['token'][0])
    {
        $returnType = '\WebnessStudio\MPL\OAuth\Model\Token';
        $request = $this->tokenRequest($grant_type, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'token'
     *
     * @param  string $grant_type Value **MUST** be set to \\\&quot;client_credentials\\\&quot;. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['token'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function tokenRequest($grant_type, string $contentType = self::contentTypes['token'][0])
    {

        // verify the required parameter 'grant_type' is set
        if ($grant_type === null || (is_array($grant_type) && count($grant_type) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $grant_type when calling token'
            );
        }


        $resourcePath = '/token';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;




        // form params
        if ($grant_type !== null) {
            $formParams['grant_type'] = ObjectSerializer::toFormValue($grant_type);
        }

        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if (!empty($this->config->getUsername()) || !(empty($this->config->getPassword()))) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
