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
namespace Booli\Api;

/**
 * Booli API for areas.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
class Image extends AbstractApi
{
    /**
     * Base URL.
     *
     * @var string
     */
    public $baseUrl = 'https://api.bcdn.se/cache';

    /**
     * Get single image data stream.
     *
     * @param  integer $booliId
     * @param  integer $width
     * @param  integer $height
     *
     * @throws InvalidArgumentException
     *
     * @return array
     */
    public function get($booliId, $width = 140, $height = 94)
    {
        if ((null !== $width && !is_int($width)) || (null !== $height && !is_int($height))) {
            throw new \InvalidArgumentException('Width and height have to be of type integer');
        }

        $width  = (null != $width) ? $width : 140;
        $height = (null != $height) ? $height : 94;

        $width  = min(140, max(0, $width));
        $height = min(94, max(0, $height));
        $url    = $this->baseUrl . '/' . "primary_{$booliId}_{$width}x{$height}.jpg";

        return $this->executeResource($url);
    }
}

