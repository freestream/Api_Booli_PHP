<?php
namespace Booli\Composer;

/**
 * Booli API abstract composer.
 *
 * @author Anton Samuelsson <samuelsson.anton@gmail.com>
 */
abstract class AbstractComposer
{
    /**
     * Default values.
     *
     * @var array
     */
    protected $_defaults = [];

    /**
     * Return object as array.
     *
     * @return array
     */
    public function asArray()
    {
        return $this->_defaults;
    }
}

