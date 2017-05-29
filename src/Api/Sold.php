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
        $response   = $this->client->getHttpClient()->get($url);

        $time       = time();
        $callerId   = $auth->getCallerId();
        $key        = $auth->getKey();
        $randomStr  = random_bytes(16);

        $params = array_replace($params, [
            'callerId'  => $callerId,
            'time'      => $time,
            'unique'    => $limit,
            'hash'      => hash('sha1', $callerId . $time . $key . $randomStr),
        ]);

        $url = \Booli\Helper\Data::getUrl($baseUrl, $filter);

        if (!$this->isJson($response)) {
            throw new \UnexpectedValueException('Unexpected result');
        }

        return json_decode($response, true);
    }
}

