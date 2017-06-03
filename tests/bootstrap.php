<?php

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

if (!defined('ROOT')) {
    define('ROOT', realpath(dirname(__DIR__)).DS);
}

if (!file_exists($autoload = ROOT.'vendor/autoload.php')) {
    throw new RuntimeException('Dependencies not installed.');
}

require $autoload;

unset($autoload);
