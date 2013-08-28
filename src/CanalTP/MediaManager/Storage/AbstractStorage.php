<?php

namespace CanalTP\MediaManager\Storage;

use CanalTP\MediaManager\Media\MediaInterface;
use CanalTP\MediaManager\Strategy\StrategyInterface;
use CanalTP\MediaManager\Storage\StorageInterface;

abstract class AbstractStorage implements StorageInterface
{
    private $path = null;

    abstract public function addMedia(
        MediaInterface $media,
        StrategyInterface $strategy
        );

    public function __construct()
    {
        $this->path = '';
    }

    public function getPath()
    {
        return ($this->path);
    }

    public function setPath($newPath)
    {
        $this->path = $newPath;
    }
}
