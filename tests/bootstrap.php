<?php

require_once __DIR__.'/../vendor/ClassLoader/UniversalClassLoader.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespace('CanalTP\\MediaManager\\Category', __DIR__.'/../src/');
$loader->registerNamespace('CanalTP\\MediaManager\\Media', __DIR__.'/../src/');
$loader->register();
