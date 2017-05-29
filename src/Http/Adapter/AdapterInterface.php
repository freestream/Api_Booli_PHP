<?php
namespace Booli\Http\Adapter;

/**
 * Booli API HTTP client adapter interface.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
interface AdapterInterface
{
    /**
     * Execute action.
     *
     * @return string
     */
    public function execute($url);
}

