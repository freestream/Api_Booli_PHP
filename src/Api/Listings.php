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
 * Booli API for listings.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
class Listings extends AbstractApi
{
    /**
     * Base URL.
     *
     * @var string
     */
    public $baseUrl = 'http://api.booli.se/listings';

    /**
     * Get all listings.
     *
     * @param  \Booli\Composer\Listings $composer
     * @param  integer                  $limit
     * @param  integer                  $page
     *
     * @throws InvalidArgumentException
     *
     * @return array
     */
    public function all(\Booli\Composer\Listings $composer, $limit = 100, $page = 0)
    {
        if ((null !== $limit && !is_int($limit)) || (null !== $page && !is_int($page))) {
            throw new \InvalidArgumentException('Limit and page have to be of type integer');
        }

        $page       = max(0, $page);
        $limit      = min(500, max(0, $limit));

        $composer   = (null == $composer) ? [] : $composer->asArray();
        $filter     = array_replace($composer, [
            'limit'     => $limit,
            'offset'    => $page*$limit,
        ]);

        return $this->execute($this->baseUrl, $filter);
    }

    /**
     * Get single listing.
     *
     * @param  integer $id
     *
     * @return array
     */
    public function get($id)
    {
        return $this->execute($this->baseUrl . '/' . $id);
    }
}

