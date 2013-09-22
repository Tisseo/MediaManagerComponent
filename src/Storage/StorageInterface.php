<?php

namespace CanalTP\MediaManager\Storage;

use CanalTP\MediaManager\Company\CompanyInterface;
use CanalTP\MediaManager\Strategy\StrategyInterface;
use CanalTP\MediaManager\Category\CategoryInterface;
use CanalTP\MediaManager\Media\MediaInterface;

interface StorageInterface
{
    public function addMedia(
        MediaInterface $media,
        StrategyInterface $strategy
    );

    public function getMediasByCategory(
        CompanyInterface $company,
        StrategyInterface $strategy,
        CategoryInterface $category
    );

    public function removeMedia(
        CompanyInterface $company,
        StrategyInterface $strategy,
        CategoryInterface $category,
        $basename
    );
}
