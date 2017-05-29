<?php
namespace Booli\Api;

/**
 * Booli API for areas.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
class Sold extends AbstractApi
{
    /**
     * Base URL.
     *
     * @var string
     */
    public $baseUrl = 'http://api.booli.se/sold';

    /**
     * Get sold objects.
     *
     * @param  \Booli\Composer\Sold $composer
     * @param  integer              $limit
     * @param  integer              $offset
     *
     * @return array
     */
    public function all(\Booli\Composer\Sold $composer = null, $limit = 100, $offset = 0)
    {
        $composer   = (null == $composer) ? [] : $composer->asArray();
        $filter     = array_replace($composer, [
            'limit'     => $limit,
            'offset'    => $offset,
        ]);

        return $this->_get($this->baseUrl, $filter);
    }

    /**
     * Get single sold object.
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

