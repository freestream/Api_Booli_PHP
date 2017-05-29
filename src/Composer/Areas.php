<?php
namespace Booli\Composer;

/**
 * Booli API composer for areas.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
class Areas
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
     * @param  string $value
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
     * @param  integer $x;
     * @param  integer $y;
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
     * @param  integer $x;
     * @param  integer $y;
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
     * @param  integer|boolean $value;
     *
     * @return \Booli\Composer\Areas
     */
    public function listings($value)
    {
        $this->_defaults['listings'] = (int) (boolean) $value;

        return $this;
    }

    /**
     * Only areas containing sold objects.
     *
     * @param  integer|boolean $value;
     *
     * @return \Booli\Composer\Areas
     */
    public function transactions($value)
    {
        $this->_defaults['transactions'] = (int) (boolean) $value;

        return $this;
    }
}

