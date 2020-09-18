<?php
/**
 * TrackingApi
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
 * OpenAPI spec version: v1-2020.8.2
 * Contact: hello@purplship.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.4.15
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
 * TrackingApi Class Doc Comment
 *
 * @category Class
 * @package  Purplship
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class TrackingApi
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
     * Operation fetch
     *
     * Track a Shipment
     *
     * @param  string $carrier_name carrier_name (required)
     * @param  string $tracking_number tracking_number (required)
     * @param  bool $test The test flag indicates whether to use a carrier configured for test. (optional, default to false)
     *
     * @throws \Purplship\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Purplship\Model\TrackingResponse
     */
    public function fetch($carrier_name, $tracking_number, $test = 'false')
    {
        list($response) = $this->fetchWithHttpInfo($carrier_name, $tracking_number, $test);
        return $response;
    }

    /**
     * Operation fetchWithHttpInfo
     *
     * Track a Shipment
     *
     * @param  string $carrier_name (required)
     * @param  string $tracking_number (required)
     * @param  bool $test The test flag indicates whether to use a carrier configured for test. (optional, default to false)
     *
     * @throws \Purplship\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Purplship\Model\TrackingResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function fetchWithHttpInfo($carrier_name, $tracking_number, $test = 'false')
    {
        $returnType = '\Purplship\Model\TrackingResponse';
        $request = $this->fetchRequest($carrier_name, $tracking_number, $test);

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
                if ($returnType !== 'string') {
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
                        '\Purplship\Model\TrackingResponse',
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
     * Operation fetchAsync
     *
     * Track a Shipment
     *
     * @param  string $carrier_name (required)
     * @param  string $tracking_number (required)
     * @param  bool $test The test flag indicates whether to use a carrier configured for test. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function fetchAsync($carrier_name, $tracking_number, $test = 'false')
    {
        return $this->fetchAsyncWithHttpInfo($carrier_name, $tracking_number, $test)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation fetchAsyncWithHttpInfo
     *
     * Track a Shipment
     *
     * @param  string $carrier_name (required)
     * @param  string $tracking_number (required)
     * @param  bool $test The test flag indicates whether to use a carrier configured for test. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function fetchAsyncWithHttpInfo($carrier_name, $tracking_number, $test = 'false')
    {
        $returnType = '\Purplship\Model\TrackingResponse';
        $request = $this->fetchRequest($carrier_name, $tracking_number, $test);

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
     * Create request for operation 'fetch'
     *
     * @param  string $carrier_name (required)
     * @param  string $tracking_number (required)
     * @param  bool $test The test flag indicates whether to use a carrier configured for test. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function fetchRequest($carrier_name, $tracking_number, $test = 'false')
    {
        // verify the required parameter 'carrier_name' is set
        if ($carrier_name === null || (is_array($carrier_name) && count($carrier_name) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $carrier_name when calling fetch'
            );
        }
        // verify the required parameter 'tracking_number' is set
        if ($tracking_number === null || (is_array($tracking_number) && count($tracking_number) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $tracking_number when calling fetch'
            );
        }

        $resourcePath = '/proxy/tracking/{carrier_name}/{tracking_number}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($test !== null) {
            $queryParams['test'] = ObjectSerializer::toQueryValue($test);
        }

        // path params
        if ($carrier_name !== null) {
            $resourcePath = str_replace(
                '{' . 'carrier_name' . '}',
                ObjectSerializer::toPathValue($carrier_name),
                $resourcePath
            );
        }
        // path params
        if ($tracking_number !== null) {
            $resourcePath = str_replace(
                '{' . 'tracking_number' . '}',
                ObjectSerializer::toPathValue($tracking_number),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

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
            
            if($headers['Content-Type'] === 'application/json') {
                // \stdClass has no __toString(), so we should encode it manually
                if ($httpBody instanceof \stdClass) {
                    $httpBody = \GuzzleHttp\json_encode($httpBody);
                }
                // array has no __toString(), so we should encode it manually
                if(is_array($httpBody)) {
                    $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($httpBody));
                }
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

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
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
            'GET',
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