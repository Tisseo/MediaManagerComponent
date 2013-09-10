<?php

namespace CanalTP\MediaManager\Strategy;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Strategy\AbstractStrategy;

class DefaultStrategy extends AbstractStrategy
{
    public function generatePath($path, $companyName)
    {
        return ($companyName.'/'.basename($path));
    }
}
