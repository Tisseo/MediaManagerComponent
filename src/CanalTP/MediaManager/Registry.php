<?php

namespace CanalTP\MediaManager;

class Registry
{
    private static $strings = array();

    public static function add($filePath)
    {
        self::$strings = array_merge(self::$strings, parse_ini_file($filePath));
    }

    public static function get($index)
    {
        return (self::$strings[$index]);
    }
}
