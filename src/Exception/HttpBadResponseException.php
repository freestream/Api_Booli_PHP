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
namespace Booli\Exception;

/**
 * Booli API exception.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
class HttpBadResponseException extends \Exception
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
     * Any response data that was returned by the server.
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

        $this->url = $url;
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
