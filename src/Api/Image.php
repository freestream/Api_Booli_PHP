<?php
namespace Booli\Api;

/**
 * Booli API for areas.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
class Image extends AbstractApi
{
    /**
     * Base URL.
     *
     * @var string
     */
    public $baseUrl = 'https://api.bcdn.se/cache';

    /**
     * Get single image data stream.
     *
     * @param  integer $booliId
     * @param  integer $width
     * @param  integer $height
     *
     * @return array
     */
    public function get($booliId, $width = 140, $height = 94)
    {
        $width  = max(140, min(0, $width));
        $height = max(94, min(0, $height));
        $url    = $this->baseUrl . '/' . "primary_{$booliId}_{$width}x{$height}.jpg";

        return $this->_getResource($url);
    }
}

