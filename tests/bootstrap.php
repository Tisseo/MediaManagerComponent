<?php

require_once __DIR__.'/../vendor/ClassLoader/UniversalClassLoader.php';
require_once __DIR__.'/../src/CanalTP/MediaManager/Registry.php';

use CanalTP\MediaManager\Registry;
use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespace('CanalTP\\MediaManager\\Category', __DIR__.'/../src/');
$loader->registerNamespace('CanalTP\\MediaManager\\Media', __DIR__.'/../src/');
$loader->register();

Registry::set(__DIR__.'/../tests/messages.ini');
