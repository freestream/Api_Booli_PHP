<?php
namespace Booli\Api;

/**
 * Abstract API.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
abstract class AbstractApi
{
    /**
     * The client.
     *
     * @var \Booli\Client
     */
    protected $client;

    /**
     * Initial configuration.
     *
     * @param \Booli\Client $client
     */
    public function __construct(\Booli\Client $client)
    {
        $this->client = $client;
    }

    /**
     * GET method.
     *
     * @param  string $baseUrl
     * @param  array  $params
     *
     * @throws HttpTokenInvalidParamsException
     *
     * @return array
     */
    protected function _get($baseUrl, array $params = [])
    {
        $auth       = $this->client->getAuthentication();
        $time       = time();
        $callerId   = $auth->getCallerId();
        $key        = $auth->getKey();
        $randomStr  = \Booli\Helper\Data::randomStr(16);

        $params = array_replace($params, [
            'callerId'  => $callerId,
            'time'      => $time,
            'unique'    => $randomStr,
            'hash'      => hash('sha1', $callerId . $time . $key . $randomStr),
        ]);

        $url        = \Booli\Helper\Data::getUrl($baseUrl, $params);
        $response   = $this->client->getHttpClient()->execute($url);

        if (!\Booli\Helper\Data::isJson($response)) {
            throw new \UnexpectedValueException('Unexpected result');
        }

        return json_decode($response, true);
    }

    /**
     * GET resource method.
     *
     * @param  string $url
     *
     * @throws HttpTokenInvalidParamsException
     *
     * @return string
     */
    protected function _getResource($url)
    {
        return $this->client->getHttpClient()->execute($url);
    }
}

