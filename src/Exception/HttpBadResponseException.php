<?php
namespace Booli\Exception;

/**
 * Booli API exception.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
class HttpBadResponseException implements \Exception
{
    /**
     * The URL that was being connected to when the exception occurred.
     *
     * @var string
     */
    private $url;

    /**
     * Response HTTP code.
     *
     * @var string
     */
    private $httpCode;

    /**
     * Any response data that was returned by the server
     *
     * @var string
     */
    private $response;

    /**
     * Initial configuration.
     *
     * @param string $message
     * @param string $url
     * @param string $httpCode
     * @param string $response
     */
    public function __construct($message, $url, $httpCode, $response)
    {
        parent::__construct($message);

        $this->url      = $url;
        $this->httpCode = $httpCode;
        $this->response = $response;
    }

    /**
     * Get URL.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get response.
     *
     * @return string
     */
    public function getHttpCode()
    {
        return $this->httpCode;
    }

    /**
     * Get response.
     *
     * @return string
     */
    public function getResponse()
    {
        return $this->response;
    }
}

