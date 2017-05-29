<?php
namespace Booli\Http;

/**
 * Booli API HTTP client.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
class Client
{
    /**
     * HTTP adapter.
     *
     * @var \Booli\Http\Adapter\AdapterInterface
     */
    private $httpAdapter;

    /**
     * Initial configuration.
     *
     * @param \Booli\Http\Adapter\AdapterInterface $adapter
     */
    public function __construct(\Booli\Http\Adapter\AdapterInterface $httpAdapter)
    {
        $this->httpAdapter  = $httpAdapter;
    }

    /**
     * Execute request.
     *
     * @return string
     */
    public function execute($url)
    {
        $response = $this->httpAdapter->execute($url);

        return $response;
    }

    /**
     * Get HTTP adapter.
     *
     * @return \Booli\Http\Adapter\AdapterInterface
     */
    public function getAdapter()
    {
        return $this->httpAdapter;
    }
}

