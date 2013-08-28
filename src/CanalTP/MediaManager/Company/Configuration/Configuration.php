<?php

namespace CanalTP\MediaManager\Company\Configuration;

use CanalTP\MediaManager\Company\Configuration\ConfigurationInterface;
use CanalTP\MediaManager\Storage\StorageInterface;
use CanalTP\MediaManager\Strategy\StrategyInterface;

class Configuration implements ConfigurationInterface
{
    private $storage = null;
    private $strategy = null;

    public function setStorage(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public function getStorage()
    {
        return ($this->storage);
    }

    public function setStrategy(StrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    public function getStrategy()
    {
        return ($this->strategy);
    }
}
