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
    public static function getUrl($baseUrl, array $params = [])
    {
        return sprintf('%s?%s', rtrim($baseUrl, '/') . '/', http_build_query(array_filter($params, 'strlen'), '', '&'));
    }

    /**
     * Is string a valid JSON.
     *
     * @param  string $string
     *
     * @return boolean
     */
    public static function isJson($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    /**
     * Get random string.
     *
     * @param  integer $length
     *
     * @return string
     */
    public static function randomStr($length = 16)
    {
        $length         = (int) $length;
        $characters     = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString   = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }
}

