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
     * @param  \Booli\Composer\Areas $composer
     * @param  integer               $limit
     *
     * @return array
     */
    public function all(\Booli\Composer\Areas $composer = null, $limit = null)
    {
        $composer   = (null == $composer) ? [] : $composer->asArray();
        $filter     = array_replace($composer, [
            'limit' => $limit,
        ]);

        return $this->_get($this->baseUrl, $filter);
    }
}

