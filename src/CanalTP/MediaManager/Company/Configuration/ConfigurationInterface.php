<?php

namespace CanalTP\MediaManager\Company\Configuration;

use CanalTP\MediaManager\Storage\StorageInterface;
use CanalTP\MediaManager\Strategy\StrategyInterface;

interface ConfigurationInterface
{
    public function setStorage(StorageInterface $storage);
    public function getStorage();
    public function setStrategy(StrategyInterface $strategy);
    public function getStrategy();
}
