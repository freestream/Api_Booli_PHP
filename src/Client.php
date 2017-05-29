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
    public function __construct(Authenticate $auth, HttpClient $httpClient = null)
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

