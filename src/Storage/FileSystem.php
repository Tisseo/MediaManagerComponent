<?php

namespace CanalTP\MediaManager\Storage;

use CanalTP\MediaManager\Company\CompanyInterface;
use CanalTP\MediaManager\Strategy\StrategyInterface;
use CanalTP\MediaManager\Category\CategoryInterface;
use CanalTP\MediaManager\Media\MediaInterface;
use CanalTP\MediaManager\Storage\AbstractStorage;
use CanalTP\MediaManager\Media\Builder\MediaBuilder;

class FileSystem extends AbstractStorage
{
    public function addMedia(
        MediaInterface $media,
        StrategyInterface $strategy
        ) {
        $result = false;
        $path = $this->getPath();
        $path .= $strategy->generatePath($media);

        if (!is_dir(dirname($path))) {
            mkdir(dirname($path), 0777, true);
        }
        if ($result = rename($media->getPath(), $path)) {
            $media->setPath($path);
        }
        return ($result);
    }

    public function getMediasByCategory(
        CompanyInterface $company,
        StrategyInterface $strategy,
        CategoryInterface $category
        ) {
        $files = $strategy->getMediasPathByCategory($company, $category);
        $mediaBuilder = new MediaBuilder();

        foreach ($files as $file) {
            $category->addMedia($mediaBuilder->buildMedia(
                    $file,
                    $company,
                    $category
                )
            );
        }
        return ($category->getMedias());
    }

    public function removeMedia(
        CompanyInterface $company,
        StrategyInterface $strategy,
        CategoryInterface $category,
        $basename
        ) {
        $files = $strategy->getMediasPathByCategory($company, $category);

        foreach ($files as $file) {
            if (basename($file) == $basename)
            {
                return (unlink($file));
            }
        }
        return (false);
    }
}
