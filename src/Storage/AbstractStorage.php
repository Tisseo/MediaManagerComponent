<?php

namespace CanalTP\MediaManager\Storage;

use CanalTP\MediaManager\Storage\StorageInterface;

abstract class AbstractStorage implements StorageInterface
{
    const TRASH_DIR = '.trash/';
    private $path = null;

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

    public function getTrashDir()
    {
        return ($this->getPath() . AbstractStorage::TRASH_DIR);
    }
}
