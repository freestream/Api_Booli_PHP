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
namespace Booli\Api;

/**
 * Booli API for areas.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
class Areas extends AbstractApi
{
    /**
     * Base URL.
     *
     * @var string
     */
    public $baseUrl = 'http://api.booli.se/areas';

    /**
     * Get all areas.
     *
     * @param \Booli\Composer\Areas $composer
     * @param int                   $limit
     *
     * @throws InvalidArgumentException
     *
     * @return array
     */
    public function all(\Booli\Composer\Areas $composer, $limit = null)
    {
        if (null !== $limit && !is_int($limit)) {
            throw new \InvalidArgumentException('Limit have to be of type integer');
        }

        $composer = (null == $composer) ? [] : $composer->asArray();
        $filter = array_replace($composer, [
            'limit' => $limit,
        ]);

        return $this->execute($this->baseUrl, $filter);
    }
}
