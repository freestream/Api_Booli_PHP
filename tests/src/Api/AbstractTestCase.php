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
namespace Booli\Tests\Api;

use Booli\Client;
use Booli\Http\Authenticate;

/**
 * Booli API.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
abstract class AbstractTestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * API class.
     *
     * @return string
     */
    abstract protected function getApiClass();

    /**
     * Mock API handler.
     *
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getApiMock()
    {
        $auth = new Authenticate('abc', '123');
        $client = new Client($auth);

        $adapter = $this->getMockBuilder(\Booli\Http\Adapter\CurlAdapter::class)
            ->setMethods(['execute'])
            ->getMock();

        $httpClient = $this->getMockBuilder(\Booli\Http\Client::class)
            ->setConstructorArgs([$adapter])
            ->setMethods(['execute'])
            ->getMock();

        $httpClient
            ->expects($this->any())
            ->method('execute');

        $client = new Client($auth, $httpClient);

        return $this->getMockBuilder($this->getApiClass())
            ->setMethods(['execute', 'executeResource'])
            ->setConstructorArgs([$client])
            ->getMock();
    }
}
