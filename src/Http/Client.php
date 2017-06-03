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
namespace Booli\Http;

/**
 * Booli API HTTP client.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
class Client
{
    /**
     * HTTP adapter.
     *
     * @var \Booli\Http\Adapter\AdapterInterface
     */
    private $httpAdapter;

    /**
     * Initial configuration.
     *
     * @param \Booli\Http\Adapter\AdapterInterface $adapter
     */
    public function __construct(\Booli\Http\Adapter\AdapterInterface $httpAdapter)
    {
        $this->httpAdapter = $httpAdapter;
    }

    /**
     * Get HTTP adapter.
     *
     * @return \Booli\Http\Adapter\AdapterInterface
     */
    public function getAdapter()
    {
        return $this->httpAdapter;
    }

    /**
     * Execute request.
     *
     * @return string
     */
    public function execute($url)
    {
        return $this->httpAdapter->execute($url);
    }
}
