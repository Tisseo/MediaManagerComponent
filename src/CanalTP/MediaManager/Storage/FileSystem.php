<?php

namespace CanalTP\MediaManager\Storage;

use CanalTP\MediaManager\Media\MediaInterface;
use CanalTP\MediaManager\Strategy\StrategyInterface;
use CanalTP\MediaManager\Storage\AbstractStorage;

class FileSystem extends AbstractStorage
{
    public function addMedia(
        MediaInterface $media,
        StrategyInterface $strategy
        ) {
        $result = false;
        $path = $this->getPath();
        $path .= $strategy->generatePath(
            $media->getPath(),
            $media->getCompany()->getName()
        );

        if (!is_dir(dirname($path))) {
            mkdir(dirname($path), 0777, true);
        }
        if ($result = rename($media->getPath(), $path)) {
            $media->setPath($path);
        }
        return ($result);
    }
}
