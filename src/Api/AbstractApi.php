<?php
/**
 * The MIT License (MIT).
 *
 * Copyright (c) 2017 Anton Samuelsson
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
?>
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
     * @param string $baseUrl
     * @param array  $params
     *
     * @throws HttpTokenInvalidParamsException
     *
     * @return array
     */
    public function execute($baseUrl, array $params = [])
    {
        $auth = $this->client->getAuthentication();
        $time = time();
        $callerId = $auth->getCallerId();
        $key = $auth->getKey();
        $randomStr = \Booli\Helper\Data::randomStr(16);

        $params = array_replace($params, [
            'callerId'  => $callerId,
            'time'      => $time,
            'unique'    => $randomStr,
            'hash'      => hash('sha1', $callerId.$time.$key.$randomStr),
        ]);

        $url = \Booli\Helper\Data::getUrl($baseUrl, $params);
        $response = $this->client->getHttpClient()->execute($url);

        if (!\Booli\Helper\Data::isJson($response)) {
            throw new \UnexpectedValueException('Unexpected result');
        }

        return json_decode($response, true);
    }

    /**
     * GET resource method.
     *
     * @param string $url
     *
     * @throws HttpTokenInvalidParamsException
     *
     * @return string
     */
    public function executeResource($url)
    {
        return $this->client->getHttpClient()->execute($url);
    }
}
