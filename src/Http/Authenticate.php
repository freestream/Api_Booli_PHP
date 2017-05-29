<?php
namespace Booli\Http;

/**
 * Booli API HTTP Authenticate.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
class Authenticate
{
    /**
     * Caller ID.
     *
     * @var string;
     */
    private $callerId;

    /**
     * Key.
     *
     * @var string;
     */
    private $key;

    /**
     * Initial configuration.
     *
     * @param string $callerId
     * @param string $key
     */
    public function __construct($callerId, $key)
    {
        $this->callerId = $callerId;
        $this->key      = $key;
    }

    /**
     * Get key.
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Get caller ID.
     *
     * @return string
     */
    public function getCallerId()
    {
        return $this->callerId;
    }
}

