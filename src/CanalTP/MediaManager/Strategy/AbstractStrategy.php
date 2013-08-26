<?php

namespace CanalTP\MediaManager\Strategy;

use CanalTP\MediaManager\Strategy\StrategyInterface;

abstract class AbstractStrategy implements StrategyInterface
{
    abstract public function generatePath($path, $companyName);
}
