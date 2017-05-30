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
namespace Booli\Tests;

use Booli\Client;
use Booli\Http\Authenticate;
use PHPUnit\Framework\TestCase;

/**
 * Booli API client.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
class ClientTest extends TestCase
{
    /**
     * @test
     */
    public function shouldNotHaveToPassHttpClientToConstructor()
    {
        $client = new Client();

        $this->assertInstanceOf(\Booli\Http\Client::class, $client->getHttpClient());
    }

    /**
     * @test
     */
    public function shouldAuthenticate()
    {
        $auth   = new Authenticate('abc', '123');
        $client = new Client($auth);

        $this->assertInstanceOf(\Booli\Http\Authenticate::class, $client->getAuthentication());
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function shouldThrowExceptionWhenAuthentionNotSet()
    {
        $client = new Client();
        $client->getAuthentication();
    }

    /**
     * @test
     * @dataProvider getApiClassesProvider
     */
    public function shouldGetApiInstance($apiName, $class)
    {
        $client = new Client();
        $this->assertInstanceOf($class, $client->api($apiName));
    }

    /**
     * @test
     * @dataProvider getApiClassesProvider
     */
    public function shouldGetMagicApiInstance($apiName, $class)
    {
        $client = new Client();
        $this->assertInstanceOf($class, $client->$apiName());
    }

    /**
     *  API class data provider.
     *
     * @return array
     */
    public function getApiClassesProvider()
    {
        return [
            ['listings', \Booli\Api\Listings::class],
            ['sold', \Booli\Api\Sold::class],
            ['areas', \Booli\Api\Areas::class],
            ['image', \Booli\Api\Image::class],
        ];
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function shouldNotGetApiInstance()
    {
        $client = new Client();
        $client->api('do_not_exist');
    }

    /**
     * @test
     * @expectedException \BadMethodCallException
     */
    public function shouldNotGetMagicApiInstance()
    {
        $client = new Client();
        $client->doNotExist();
    }
}

