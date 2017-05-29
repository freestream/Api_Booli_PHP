<?php
namespace Booli\Http\Adapter;

use Booli\Exception\HttpCurlErrorException;
use Booli\Exception\HttpBadResponseException;

/**
 * Booli API HTTP client.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
class CurlAdapter implements AdapterInterface
{
    /**
     * Execute action.
     *
     * @return string
     */
    public function execute($url)
    {
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);

        $response = curl_exec($curl);

        if (!($error = curl_errno($curl))) {
            $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            if ($httpCode >= 400) {
                throw new HttpBadResponseException("Got response code {$httpCode}", $url, $httpCode, $response);
            }
        } else {
            throw new HttpCurlErrorException("Got CURL error code {$error}", $url, $error);
        }
    }
}

