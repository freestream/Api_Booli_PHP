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
     * @param  integer                  $offset
     *
     * @return array
     */
    public function all(\Booli\Composer\Listings $composer = null, $limit = 100, $offset = 0)
    {
        $composer   = (null == $composer) ? [] : $composer->asArray();
        $filter     = array_replace($composer, [
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
        return $this->_get($this->baseUrl . '/' . $id);
    }
}

