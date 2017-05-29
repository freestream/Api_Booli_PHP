<?php
namespace Booli\Helper;

/**
 * Booli API composer for areas.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
class Data
{
    /**
     * Generate URL.
     *
     * @param  string $baseUrl
     * @param  array  $params
     *
     * @return string
     */
    public static function getUrl($baseUrl, $path = null, array $params = [])
    {
        $baseUrl = rtrim($baseUrl, '/') . '/' . trim($path, '/');

        return sprintf('%s?%s', $baseUrl, $params);
    }

    /**
     * Is string a valid JSON.
     *
     * @param  string $string
     *
     * @return boolean
     */
    public function isJson($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}

