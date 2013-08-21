<?php

namespace CanalTP\MediaManager;

class Registry
{
    private static $_strings = false;

    public static function set($filePath)
    {
        self::$_strings = parse_ini_file($filePath);
    }

    public static function get($index)
    {
        return (self::$_strings[$index]);
    }
}
