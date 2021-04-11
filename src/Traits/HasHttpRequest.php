<?php

namespace really4you\E\Sign\Traits;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Trait HasHttpRequest.
 */
trait HasHttpRequest
{
    /**
     *
     * @var array
     */
    private $http = [
        'PUT'    => 'putJson',
        'POST'   => 'postJson',
        'GET'    => 'get',
        'DELETE' => 'delete'
    ];

    /**
     * Make a get request.
     *
     * @param string $endpoint
     * @param array  $query
     * @param array  $headers
     *
     * @return ResponseInterface|array|string
     */
    protected function get($endpoint, $query = [], $headers = [])
    {
        return $this->request('get', $endpoint, [
            'headers' => $headers,
            'query' => $query,
        ]);
    }

    /**
     * Make a post request.
     *
     * @param string $endpoint
     * @param array  $params
     * @param array  $headers
     *
     * @return ResponseInterface|array|string
     */
    protected function post($endpoint, $params = [], $headers = [])
    {
        return $this->request('post', $endpoint, [
            'headers' => $headers,
            'form_params' => $params,
        ]);
    }

    /**
     * Make a post request with json params.
     *
     * @param       $endpoint
     * @param array $params
     * @param array $headers
     *
     * @return ResponseInterface|array|string
     */
    protected function postJson($endpoint, $params = [], $headers = [])
    {
        return $this->request('post', $endpoint, [
            'headers' => $headers,
            'json' => $params,
        ]);
    }

    /**
     * make a put request
     *
     * @param $endpoint
     * @param array $params
     * @param array $headers
     *
     * @return array|ResponseInterface|string
     */
    protected function putJson($endpoint, $params = [], $headers = [])
    {
        return $this->request('put', $endpoint, [
            'headers' => $headers,
            'json' => $params,
        ]);
    }

    /**
     * make a delete request
     *
     * @param $endpoint
     * @param array $params
     * @param array $headers
     *
     * @return array|ResponseInterface|string
     */
    protected function delete($endpoint, $params = [], $headers = [])
    {
        return $this->request('delete', $endpoint, [
            'headers' => $headers,
            'json' => $params,
        ]);
    }

    /**
     * make a e-sign request
     *
     * @param $method
     * @param $endpoint
     * @param array $options
     * @param array $headers
     *
     * @return mixed
     */
    protected function eSignRequest($method, $endpoint, $options = [] ,$headers = [])
    {
       return $this->{$this->http[$method]}($endpoint, $options, $headers);
    }

    /**
     * Make a http request.
     *
     * @param string $method
     * @param string $endpoint
     * @param array  $options  http://docs.guzzlephp.org/en/latest/request-options.html
     *
     * @return ResponseInterface|array|string
     */
    protected function request($method, $endpoint, $options = [])
    {
        return $this->unwrapResponse($this->getHttpClient($this->getBaseOptions())->{$method}($endpoint, $options));
    }

    /**
     * Return base Guzzle options.
     *
     * @return array
     */
    protected function getBaseOptions()
    {
        $options = method_exists($this, 'getGuzzleOptions') ? $this->getGuzzleOptions() : [];

        // default
        $options['verify']  = false;
        //$options['debug']  = true;

        return \array_merge($options, [
            'base_uri' => method_exists($this, 'getBaseUri') ? $this->getBaseUri() : '',
            'timeout' => method_exists($this, 'getTimeout') ? $this->getTimeout() : 5.0,
        ]);
    }

    /**
     * Return http client.
     *
     * @param array $options
     *
     * @return \GuzzleHttp\Client
     *
     * @codeCoverageIgnore
     */
    protected function getHttpClient(array $options = [])
    {
        return new Client($options);
    }

    /**
     * Convert response contents to json.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return ResponseInterface|array|string
     */
    protected function unwrapResponse(ResponseInterface $response)
    {
        $contentType = $response->getHeaderLine('Content-Type');
        $contents = $response->getBody()->getContents();

        if (false !== stripos($contentType, 'json') || stripos($contentType, 'javascript')) {
            //return json_decode($contents, true);   // todo
            return $contents;
        } elseif (false !== stripos($contentType, 'xml')) {
            return json_decode(json_encode(simplexml_load_string($contents)), true);
        }

        return $contents;
    }
}