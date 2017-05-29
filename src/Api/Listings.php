<?php
namespace Booli\Api;

/**
 * Booli API for listings.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
class Listings
{
    /**
     * Base URL.
     *
     * @var string
     */
    public $baseUrl = 'http://api.booli.se';

    /**
     * Get all listings.
     *
     * @param  \Booli\Composer\Listings $composer
     * @param  integer                  $limit
     * @param  integer                  $offset
     *
     * @return array
     */
    public function all(\Booli\Composer\Listings $composer, $limit = null, $offset = null)
    {
        $filter = array_replace($composer->asArray(), [
            'limit'     => $limit,
            'offset'    => $offset,
        ]);

        return $this->_get($this->baseUrl, $filter);
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
        $url = \Booli\Helper\Data::getUrl($this->baseUrl, $id);

        return $this->_get($url);
    }
}

