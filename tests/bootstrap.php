<?php

require_once __DIR__.'/../vendor/ClassLoader/UniversalClassLoader.php';
require_once __DIR__.'/../src/CanalTP/MediaManager/Registry.php';

use CanalTP\MediaManager\Registry;
use Symfony\Component\ClassLoader\UniversalClassLoader;

$folder = __DIR__.'/../src/';
$loader = new UniversalClassLoader();
$loader->registerNamespace('CanalTP\\MediaManager\\Category', $folder);
$loader->registerNamespace('CanalTP\\MediaManager\\Media', $folder);
$loader->register();

Registry::set(__DIR__.'/../tests/messages.ini');
