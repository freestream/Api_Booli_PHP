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

/**
 * Booli API.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
class ImageTest extends AbstractTestCase
{
    /**
     * @test
     * @dataProvider getApiGetProvider
     */
    public function shouldGet($x, $y, $expected)
    {
        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('executeResource')
            ->with($expected);

        $api->get(1234, $x, $y);
    }

    /**
     *  API class data provider.
     *
     * @return array
     */
    public function getApiGetProvider()
    {
        $api = $this->getApiMock();

        return [
            [null, null, $api->baseUrl . '/' . 'primary_1234_140x94.jpg'],
            [100, 90, $api->baseUrl . '/' . 'primary_1234_100x90.jpg'],
            [200, 200, $api->baseUrl . '/' . 'primary_1234_140x94.jpg'],
            [null, 100, $api->baseUrl . '/' . 'primary_1234_140x94.jpg'],
            [140, 100, $api->baseUrl . '/' . 'primary_1234_140x94.jpg'],
            [200, null, $api->baseUrl . '/' . 'primary_1234_140x94.jpg'],
        ];
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function shouldThrowExceptionWidthNonIntBooliId()
    {
        $api = $this->getApiMock();
        $api->get("1234");
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function shouldThrowExceptionWidthNonIntParam()
    {
        $api = $this->getApiMock();
        $api->get(1234, new \stdClass);
    }

    /**
     * API class.
     *
     * @return string
     */
    protected function getApiClass()
    {
        return \Booli\Api\Image::class;
    }
}

