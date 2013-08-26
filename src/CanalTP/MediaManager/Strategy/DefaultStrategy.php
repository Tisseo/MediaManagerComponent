<?php

namespace CanalTP\MediaManager\Strategy;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Strategy\AbstractStrategy;

class DefaultStrategy extends AbstractStrategy
{
    public function generatePath($path, $companyName)
    {
        return (Registry::get('TMP_PATH').$companyName.'/'.basename($path));
    }
}
