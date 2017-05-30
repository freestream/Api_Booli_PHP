<?php
/**
 * The MIT License (MIT)
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
namespace Booli;

use Booli\Http\Client as HttpClient;
use Booli\Http\Adapter\CurlAdapter;
use Booli\Http\Authenticate;

/**
 * Booli API client.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
class Client
{
    /**
     * Authentication credentials.
     *
     * @var \Booli\Http\Authenticate
     */
    public $auth;

    /**
     * HTTP client.
     *
     * @var \Booli\Http\Client
     */
    public $httpClient;

    /**
     * Instal configuration.
     *
     * @param \Booli\Http\Authenticate $auth
     * @param \Booli\Http\Client       $httpClient
     */
    public function __construct(Authenticate $auth = null, HttpClient $httpClient = null)
    {
        $this->httpClient   = $httpClient ?: new HttpClient(new CurlAdapter());
        $this->auth         = $auth;
    }

    /**
     * Get authentication.
     *
     * @throws InvalidArgumentException
     *
     * @return null|\Booli\Http\Authenticate
     */
    public function getAuthentication()
    {
        if (null == $this->auth) {
            throw new \InvalidArgumentException('No authenticate object exists');
        }

        return $this->auth;
    }

    /**
     * Get API resource.
     *
     * @param  string $name
     *
     * @throws InvalidArgumentException
     *
     * @return ApiInterface
     */
    public function api($name)
    {
        switch ($name) {
            case 'listings':
                $api = new \Booli\Api\Listings($this);
                break;
            case 'sold':
                $api = new \Booli\Api\Sold($this);
                break;
            case 'areas':
                $api = new \Booli\Api\Areas($this);
                break;
            case 'image':
                $api = new \Booli\Api\Image($this);
                break;
            default:
                throw new \InvalidArgumentException(sprintf('Undefined API resource called: "%s"', $name));
        }

        return $api;
    }

    /**
     * Magic method for selecting API resource.
     *
     * @param  string $name
     * @param  array  $args
     *
     * @throws \BadMethodCallException
     *
     * @return ApiInterface
     */
    public function __call($name, $args)
    {
        try {
            return $this->api($name);
        } catch (\InvalidArgumentException $e) {
            throw new \BadMethodCallException(sprintf('Undefined method called: "%s"', $name));
        }
    }

    /**
     * Get HTTP client.
     *
     * @return \Booli\Http\Client
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }
}

