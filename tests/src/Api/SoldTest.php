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
namespace Booli\Tests\Api;

use Booli\Client;
use Booli\Composer\Sold as Composer;

/**
 * Booli API.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
class SoldTest extends AbstractTestCase
{
    /**
     * @test
     */
    public function shouldGetAll()
    {
        $composer = new Composer;
        $expected = array_replace($composer->asArray(), [
            'limit'     => 100,
            'offset'    => 0,
        ]);

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('execute')
            ->with($api->baseUrl, $expected);

        $api->all($composer);
    }

    /**
     * @test
     */
    public function shouldGetLimted()
    {
        $composer = new Composer;
        $expected = array_replace($composer->asArray(), [
            'limit'     => 200,
            'offset'    => 200*2,
        ]);

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('execute')
            ->with($api->baseUrl, $expected);

        $api->all($composer, 200, 2);
    }

    /**
     * @test
     */
    public function shouldGetOne()
    {
        $id     = 123;
        $api    = $this->getApiMock();

        $api->expects($this->once())
            ->method('execute')
            ->with($api->baseUrl . '/' . $id);

        $api->get($id);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function shouldThrowExceptionWidthNonIntParam()
    {
        $composer = new Composer;

        $api = $this->getApiMock();
        $api->all($composer, new \stdClass, new \stdClass);
    }

    /**
     * API class.
     *
     * @return string
     */
    protected function getApiClass()
    {
        return \Booli\Api\Sold::class;
    }
}

