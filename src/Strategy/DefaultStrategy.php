<?php

namespace CanalTP\MediaManager\Strategy;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Strategy\AbstractStrategy;

class DefaultStrategy extends AbstractStrategy
{
    public function generatePath($media)
    {
        $path = $media->getCompany()->getName() . '/';
        $path .= $media->getCategory()->getName() . '/';
        $path .= $media->getBaseName();

        return ($path);
    }
}
