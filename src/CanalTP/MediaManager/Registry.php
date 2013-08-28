<?php

namespace CanalTP\MediaManager;

/**
 * @codeCoverageIgnore
 */
class Registry
{
    private static $strings = array();

    public static function addByFile($filePath)
    {
        self::$strings = array_merge(
            self::$strings,
            parse_ini_file($filePath)
        );
    }

    public static function add($key, $value)
    {
        self::$strings = array_merge(self::$strings, array($key => $value));
    }

    public static function get($index)
    {
        return (self::$strings[$index]);
    }
}
