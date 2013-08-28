<?php

namespace CanalTP\MediaManager\Storage;

use CanalTP\MediaManager\Media\MediaInterface;
use CanalTP\MediaManager\Strategy\StrategyInterface;

interface StorageInterface
{
    public function addMedia(
        MediaInterface $media,
        StrategyInterface $strategy
    );
}
