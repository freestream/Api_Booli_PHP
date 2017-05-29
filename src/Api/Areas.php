<?php
namespace Booli\Api;

/**
 * Booli API for areas.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
class Areas
{
    /**
     * Base URL.
     *
     * @var string
     */
    public $baseUrl = 'http://api.booli.se';

    /**
     * Get all areas.
     *
     * @param  \Booli\Composer\Areas $composer
     * @param  integer               $limit
     *
     * @return array
     */
    public function all(\Booli\Composer\Areas $composer, $limit = null)
    {
        $filter = array_replace($composer->asArray(), [
            'limit' => $limit,
        ]);

        return $this->_get($this->baseUrl, $filter);
    }
}

