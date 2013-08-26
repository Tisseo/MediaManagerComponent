<?php

namespace CanalTP\MediaManager;

class Registry
{
    private static $strings = null;

    public function __construct()
    {
        self::$strings = array();
    }

    public static function add($filePath)
    {
        array_push(self::$strings, parse_ini_file($filePath));
    }

    public static function get($index)
    {
        return (self::$strings[$index]);
    }
}
