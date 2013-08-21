<?php

namespace CanalTP\MediaManager;

class Registry
{
    private static $strings = false;

    public static function set($filePath)
    {
        self::$strings = parse_ini_file($filePath);
    }

    public static function get($index)
    {
        return (self::$strings[$index]);
    }
}
