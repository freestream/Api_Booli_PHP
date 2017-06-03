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
namespace Booli\Composer;

/**
 * Booli API composer for areas.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
class Areas extends AbstractComposer
{
    /**
     * Default values.
     *
     * @var array
     */
    protected $_defaults = [
        'q'                     => null,
        'lat'                   => null,
        'lng'                   => null,
        'listings'              => null,
        'transactions'          => null,
    ];

    /**
     * Search query.
     *
     * @param string $value
     *
     * @return \Booli\Composer\Areas
     */
    public function query($value)
    {
        $this->_defaults['q'] = $value;

        return $this;
    }

    /**
     * Latitude coordinates.
     *
     * @see    \Booli\Composer\Areas::lng($x, $y)
     *
     * @param int $x
     * @param int $y
     *
     * @return \Booli\Composer\Areas
     */
    public function lat($x, $y)
    {
        $this->_defaults['lat'] = "{$x},{$y}";

        return $this;
    }

    /**
     * Longitude coordinates.
     *
     * @see    \Booli\Composer\Areas::lat($x, $y)
     *
     * @param int $x
     * @param int $y
     *
     * @return \Booli\Composer\Areas
     */
    public function lng($x, $y)
    {
        $this->_defaults['lng'] = "{$x},{$y}";

        return $this;
    }

    /**
     * Only areas containing listings.
     *
     * @param int|bool $value
     *
     * @return \Booli\Composer\Areas
     */
    public function listings($value)
    {
        $this->_defaults['listings'] = (int) (bool) $value;

        return $this;
    }

    /**
     * Only areas containing sold objects.
     *
     * @param int|bool $value
     *
     * @return \Booli\Composer\Areas
     */
    public function transactions($value)
    {
        $this->_defaults['transactions'] = (int) (bool) $value;

        return $this;
    }
}
