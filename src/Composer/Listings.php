<?php
namespace Booli\Composer;

/**
 * Booli API for listings.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
class Listings extends AbstractComposer
{
    /**
     * Default values.
     *
     * @var array
     */
    protected $_defaults = [
        'q'                     => null,
        'center'                => null,
        'dim'                   => null,
        'bbox'                  => null,
        'areaId'                => null,
        'minListPrice'          => null,
        'maxListPrice'          => null,
        'minListSqmPrice'       => null,
        'maxListSqmPrice'       => null,
        'minRooms'              => null,
        'maxRooms'              => null,
        'maxRent'               => null,
        'minLivingArea'         => null,
        'maxLivingArea'         => null,
        'minPlotArea'           => null,
        'maxPlotArea'           => null,
        'objectType'            => null,
        'minConstructionYear'   => null,
        'maxConstructionYear'   => null,
        'minPublished'          => null,
        'maxPublished'          => null,
        'priceDecrease'         => null,
        'isNewConstruction'     => null,
        'includeUnset'          => null,
        'limit'                 => null,
        'offset'                => null,
    ];

    /**
     * Search query.
     *
     * @param  string $value
     *
     * @return \Booli\Composer\Listings
     */
    public function query($value)
    {
        $this->_defaults['q'] = $value;

        return $this;
    }

    /**
     * Center coordinates of dimension.
     *
     * @see    \Booli\Composer\Listings::dim($x, $y)
     *
     * @param  integer $x;
     * @param  integer $y;
     *
     * @return \Booli\Composer\Listings
     */
    public function center($x, $y)
    {
        $this->_defaults['center'] = "{$x},{$y}";

        return $this;
    }

    /**
     * Dimension of rectangle.
     * Values is given in meters.
     *
     * @see    \Booli\Composer\Listings::center($x, $y)
     *
     * @param  integer $x;
     * @param  integer $y;
     *
     * @return \Booli\Composer\Listings
     */
    public function dim($x, $y)
    {
        $this->_defaults['dim'] = "{$x},{$y}";

        return $this;
    }

    /**
     * Coordinates that forms a rectangle area.
     *
     * $listings->bbox($lat1, $lo1, $lat2, $lo2, $lat3, $lo3, $lat4, $lo4);
     * or
     * $listings->bbox([$lat, $lo], [$lat, $lo], [$lat, $lo], [$lat], $lo]);
     *
     * @return \Booli\Composer\Listings
     */
    public function bbox(...$params)
    {
        if (4 !== count($params)) {
            $prams = array_slice(array_chunk(array_pad($params, 8, null), 2), 0 , 4);
        }

        foreach ($params as &$param) {
            list($x, $y) = $param;
            $param = "{$x},{$y}";
        }

        $this->_defaults['bbox'] = implode(',', $params);

        return $this;
    }

    /**
     * Area IDs.
     *
     * @param  array|integer $value;
     *
     * @return \Booli\Composer\Listings
     */
    public function areaId($value)
    {
        $this->_defaults['areaId'] = (array) $value;

        return $this;
    }

    /**
     * Minimum listing price.
     *
     * @param  integer $value;
     *
     * @return \Booli\Composer\Listings
     */
    public function minListPrice($value)
    {
        $this->_defaults['minListPrice'] = $value;

        return $this;
    }

    /**
     * Maximum listing price.
     *
     * @param  integer $value;
     *
     * @return \Booli\Composer\Listings
     */
    public function maxListPrice($value)
    {
        $this->_defaults['maxListPrice'] = $value;

        return $this;
    }

    /**
     * Minimum price per square meter.
     *
     * @param  integer $value;
     *
     * @return \Booli\Composer\Listings
     */
    public function minListSqmPrice($value)
    {
        $this->_defaults['minListSqmPrice'] = $value;

        return $this;
    }

    /**
     * Maximum price per square meter.
     *
     * @param  integer $value;
     *
     * @return \Booli\Composer\Listings
     */
    public function maxListSqmPrice($value)
    {
        $this->_defaults['maxListSqmPrice'] = $value;

        return $this;
    }

    /**
     * Minimum amount of rooms.
     *
     * @param  integer $value;
     *
     * @return \Booli\Composer\Listings
     */
    public function minRooms($value)
    {
        $this->_defaults['minRooms'] = $value;

        return $this;
    }

    /**
     * Maximum amount of rooms.
     *
     * @param  integer $value;
     *
     * @return \Booli\Composer\Listings
     */
    public function maxRooms($value)
    {
        $this->_defaults['maxRooms'] = $value;

        return $this;
    }

    /**
     * Maximum rent.
     *
     * @param  integer $value;
     *
     * @return \Booli\Composer\Listings
     */
    public function maxRent($value)
    {
        $this->_defaults['maxRent'] = $value;

        return $this;
    }

    /**
     * Minimum living area.
     *
     * @param  integer $value;
     *
     * @return \Booli\Composer\Listings
     */
    public function minLivingArea($value)
    {
        $this->_defaults['minLivingArea'] = $value;

        return $this;
    }

    /**
     * Maximum living area.
     *
     * @param  integer $value;
     *
     * @return \Booli\Composer\Listings
     */
    public function maxLivingArea($value)
    {
        $this->_defaults['maxLivingArea'] = $value;

        return $this;
    }

    /**
     * Minimum plot area.
     *
     * @param  integer $value;
     *
     * @return \Booli\Composer\Listings
     */
    public function minPlotArea($value)
    {
        $this->_defaults['minPlotArea'] = $value;

        return $this;
    }

    /**
     * Maximum plot area.
     *
     * @param  integer $value;
     *
     * @return \Booli\Composer\Listings
     */
    public function maxPlotArea($value)
    {
        $this->_defaults['maxPlotArea'] = $value;

        return $this;
    }

    /**
     * Property type.
     *
     * @param  string|array $value;
     *
     * @return \Booli\Composer\Listings
     */
    public function objectType($value)
    {
        $this->_defaults['objectType'] = implode(',', (array) $value);

        return $this;
    }

    /**
     * Minimum year of construction.
     *
     * @param  integer $value;
     *
     * @return \Booli\Composer\Listings
     */
    public function minConstructionYear($value)
    {
        $this->_defaults['minConstructionYear'] = $value;

        return $this;
    }

    /**
     * Maximum year of construction.
     *
     * @param  integer $value;
     *
     * @return \Booli\Composer\Listings
     */
    public function maxConstructionYear($value)
    {
        $this->_defaults['maxConstructionYear'] = $value;

        return $this;
    }

    /**
     * Earliest date the object was published.
     *
     * @param  \DateTime $date;
     *
     * @return \Booli\Composer\Listings
     */
    public function minPublished(\DateTime $date)
    {
        $this->_defaults['minPublished'] = $date->format('Ymd');

        return $this;
    }

    /**
     * The last date the object was published.
     *
     * @param  \DateTime $date;
     *
     * @return \Booli\Composer\Listings
     */
    public function maxPublished(\DateTime $date)
    {
        $this->_defaults['maxPublished'] = $date->format('Ymd');

        return $this;
    }

    /**
     * Only listings with decreased price.
     *
     * @param  integer $value;
     *
     * @return \Booli\Composer\Listings
     */
    public function priceDecrease($value)
    {
        $this->_defaults['priceDecrease'] = (int) (boolean) $value;

        return $this;
    }

    /**
     * Show only new production or exclude listings.
     *
     * @param  integer $value;
     *
     * @return \Booli\Composer\Listings
     */
    public function isNewConstruction($value)
    {
        $this->_defaults['isNewConstruction'] = (int) (boolean) $value;

        return $this;
    }

    /**
     * Include listings with missing data attributes,
     *
     * @param  integer $value;
     *
     * @return \Booli\Composer\Listings
     */
    public function includeUnset($value)
    {
        $this->_defaults['includeUnset'] = (int) (boolean) $value;

        return $this;
    }
}

