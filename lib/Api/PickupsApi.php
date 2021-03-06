<?php
/**
 * PickupsApi
 * PHP version 5
 *
 * @category Class
 * @package  Purplship
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Purplship Open Source Multi-carrier Shipping API
 *
 * Purplship is an open source multi-carrier shipping API that simplifies the integration of logistic carrier services  The **proxy** endpoints are stateless and forwards calls to carriers web services.
 *
 * OpenAPI spec version: v1-2020.11
 * Contact: hello@purplship.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.23
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Purplship\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Purplship\ApiException;
use Purplship\Configuration;
use Purplship\HeaderSelector;
use Purplship\ObjectSerializer;

/**
 * PickupsApi Class Doc Comment
 *
 * @category Class
 * @package  Purplship
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PickupsApi
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
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation cancel
     *
     * Cancel a pickup
     *
     * @param  \Purplship\Model\PickupCancelRequest $body body (required)
     * @param  string $carrier_name carrier_name (required)
     * @param  bool $test The test flag indicates whether to use a carrier configured for test. (optional, default to false)
     *
     * @throws \Purplship\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Purplship\Model\OperationResponse
     */
    public function cancel($body, $carrier_name, $test = 'false')
    {
        list($response) = $this->cancelWithHttpInfo(is_array($body) ? new \Purplship\Model\PickupCancelRequest($body) : $body, $carrier_name, $test);
        return $response;
    }

    /**
     * Operation cancelWithHttpInfo
     *
     * Cancel a pickup
     *
     * @param  \Purplship\Model\PickupCancelRequest $body (required)
     * @param  string $carrier_name (required)
     * @param  bool $test The test flag indicates whether to use a carrier configured for test. (optional, default to false)
     *
     * @throws \Purplship\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Purplship\Model\OperationResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function cancelWithHttpInfo($body, $carrier_name, $test = 'false')
    {
        $returnType = '\Purplship\Model\OperationResponse';
        $request = $this->cancelRequest($body, $carrier_name, $test);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
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
                        '\Purplship\Model\OperationResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Purplship\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation cancelAsync
     *
     * Cancel a pickup
     *
     * @param  \Purplship\Model\PickupCancelRequest $body (required)
     * @param  string $carrier_name (required)
     * @param  bool $test The test flag indicates whether to use a carrier configured for test. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function cancelAsync($body, $carrier_name, $test = 'false')
    {
        return $this->cancelAsyncWithHttpInfo($body, $carrier_name, $test)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation cancelAsyncWithHttpInfo
     *
     * Cancel a pickup
     *
     * @param  \Purplship\Model\PickupCancelRequest $body (required)
     * @param  string $carrier_name (required)
     * @param  bool $test The test flag indicates whether to use a carrier configured for test. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function cancelAsyncWithHttpInfo($body, $carrier_name, $test = 'false')
    {
        $returnType = '\Purplship\Model\OperationResponse';
        $request = $this->cancelRequest($body, $carrier_name, $test);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
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
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'cancel'
     *
     * @param  \Purplship\Model\PickupCancelRequest $body (required)
     * @param  string $carrier_name (required)
     * @param  bool $test The test flag indicates whether to use a carrier configured for test. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function cancelRequest($body, $carrier_name, $test = 'false')
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling cancel'
            );
        }
        // verify the required parameter 'carrier_name' is set
        if ($carrier_name === null || (is_array($carrier_name) && count($carrier_name) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $carrier_name when calling cancel'
            );
        }

        $resourcePath = '/proxy/pickups/{carrier_name}/cancel';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($test !== null) {
            $queryParams['test'] = ObjectSerializer::toQueryValue($test, null);
        }

        // path params
        if ($carrier_name !== null) {
            $resourcePath = str_replace(
                '{' . 'carrier_name' . '}',
                ObjectSerializer::toPathValue($carrier_name),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation schedule
     *
     * Schedule a pickup
     *
     * @param  \Purplship\Model\PickupRequest $body body (required)
     * @param  string $carrier_name carrier_name (required)
     * @param  bool $test The test flag indicates whether to use a carrier configured for test. (optional, default to false)
     *
     * @throws \Purplship\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Purplship\Model\PickupResponse
     */
    public function schedule($body, $carrier_name, $test = 'false')
    {
        list($response) = $this->scheduleWithHttpInfo(
            is_array($body) ? new \Purplship\Model\PickupRequest($body) : $body, $carrier_name, $test);
        return $response;
    }

    /**
     * Operation scheduleWithHttpInfo
     *
     * Schedule a pickup
     *
     * @param  \Purplship\Model\PickupRequest $body (required)
     * @param  string $carrier_name (required)
     * @param  bool $test The test flag indicates whether to use a carrier configured for test. (optional, default to false)
     *
     * @throws \Purplship\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Purplship\Model\PickupResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function scheduleWithHttpInfo($body, $carrier_name, $test = 'false')
    {
        $returnType = '\Purplship\Model\PickupResponse';
        $request = $this->scheduleRequest($body, $carrier_name, $test);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
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
                        '\Purplship\Model\PickupResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Purplship\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation scheduleAsync
     *
     * Schedule a pickup
     *
     * @param  \Purplship\Model\PickupRequest $body (required)
     * @param  string $carrier_name (required)
     * @param  bool $test The test flag indicates whether to use a carrier configured for test. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function scheduleAsync($body, $carrier_name, $test = 'false')
    {
        return $this->scheduleAsyncWithHttpInfo($body, $carrier_name, $test)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation scheduleAsyncWithHttpInfo
     *
     * Schedule a pickup
     *
     * @param  \Purplship\Model\PickupRequest $body (required)
     * @param  string $carrier_name (required)
     * @param  bool $test The test flag indicates whether to use a carrier configured for test. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function scheduleAsyncWithHttpInfo($body, $carrier_name, $test = 'false')
    {
        $returnType = '\Purplship\Model\PickupResponse';
        $request = $this->scheduleRequest($body, $carrier_name, $test);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
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
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'schedule'
     *
     * @param  \Purplship\Model\PickupRequest $body (required)
     * @param  string $carrier_name (required)
     * @param  bool $test The test flag indicates whether to use a carrier configured for test. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function scheduleRequest($body, $carrier_name, $test = 'false')
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling schedule'
            );
        }
        // verify the required parameter 'carrier_name' is set
        if ($carrier_name === null || (is_array($carrier_name) && count($carrier_name) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $carrier_name when calling schedule'
            );
        }

        $resourcePath = '/proxy/pickups/{carrier_name}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($test !== null) {
            $queryParams['test'] = ObjectSerializer::toQueryValue($test, null);
        }

        // path params
        if ($carrier_name !== null) {
            $resourcePath = str_replace(
                '{' . 'carrier_name' . '}',
                ObjectSerializer::toPathValue($carrier_name),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation update
     *
     * Update a pickup
     *
     * @param  \Purplship\Model\PickupUpdateRequest $body body (required)
     * @param  string $carrier_name carrier_name (required)
     * @param  bool $test The test flag indicates whether to use a carrier configured for test. (optional, default to false)
     *
     * @throws \Purplship\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Purplship\Model\PickupResponse
     */
    public function update($body, $carrier_name, $test = 'false')
    {
        list($response) = $this->updateWithHttpInfo(
            is_array($body) ? new \Purplship\Model\PickupUpdateRequest($body) : $body, $carrier_name, $test);
        return $response;
    }

    /**
     * Operation updateWithHttpInfo
     *
     * Update a pickup
     *
     * @param  \Purplship\Model\PickupUpdateRequest $body (required)
     * @param  string $carrier_name (required)
     * @param  bool $test The test flag indicates whether to use a carrier configured for test. (optional, default to false)
     *
     * @throws \Purplship\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Purplship\Model\PickupResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateWithHttpInfo($body, $carrier_name, $test = 'false')
    {
        $returnType = '\Purplship\Model\PickupResponse';
        $request = $this->updateRequest($body, $carrier_name, $test);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
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
                        '\Purplship\Model\PickupResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Purplship\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updateAsync
     *
     * Update a pickup
     *
     * @param  \Purplship\Model\PickupUpdateRequest $body (required)
     * @param  string $carrier_name (required)
     * @param  bool $test The test flag indicates whether to use a carrier configured for test. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateAsync($body, $carrier_name, $test = 'false')
    {
        return $this->updateAsyncWithHttpInfo($body, $carrier_name, $test)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateAsyncWithHttpInfo
     *
     * Update a pickup
     *
     * @param  \Purplship\Model\PickupUpdateRequest $body (required)
     * @param  string $carrier_name (required)
     * @param  bool $test The test flag indicates whether to use a carrier configured for test. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateAsyncWithHttpInfo($body, $carrier_name, $test = 'false')
    {
        $returnType = '\Purplship\Model\PickupResponse';
        $request = $this->updateRequest($body, $carrier_name, $test);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
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
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'update'
     *
     * @param  \Purplship\Model\PickupUpdateRequest $body (required)
     * @param  string $carrier_name (required)
     * @param  bool $test The test flag indicates whether to use a carrier configured for test. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateRequest($body, $carrier_name, $test = 'false')
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling update'
            );
        }
        // verify the required parameter 'carrier_name' is set
        if ($carrier_name === null || (is_array($carrier_name) && count($carrier_name) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $carrier_name when calling update'
            );
        }

        $resourcePath = '/proxy/pickups/{carrier_name}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($test !== null) {
            $queryParams['test'] = ObjectSerializer::toQueryValue($test, null);
        }

        // path params
        if ($carrier_name !== null) {
            $resourcePath = str_replace(
                '{' . 'carrier_name' . '}',
                ObjectSerializer::toPathValue($carrier_name),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
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
