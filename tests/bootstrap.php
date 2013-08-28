<?php

require_once __DIR__.'/../vendor/ClassLoader/UniversalClassLoader.php';
require_once __DIR__.'/../src/CanalTP/MediaManager/Registry.php';

use CanalTP\MediaManager\Registry;
use Symfony\Component\ClassLoader\UniversalClassLoader;

$folder = __DIR__.'/../src/';
$loader = new UniversalClassLoader();
$loader->registerNamespace('CanalTP\\MediaManager\\Company', $folder);
$loader->registerNamespace('CanalTP\\MediaManager\\Category', $folder);
$loader->registerNamespace('CanalTP\\MediaManager\\Media', $folder);
$loader->registerNamespace('CanalTP\\MediaManager\\Strategy', $folder);
$loader->registerNamespace('CanalTP\\MediaManager\\Storage', $folder);
$loader->register();

$folder = __DIR__.'/../tests/data/registry/';
Registry::addByFile($folder . 'strings.ini');
Registry::addByFile($folder . 'messages.ini');
Registry::addByFile($folder . 'types.ini');
Registry::add('/', __DIR__ . '/');
