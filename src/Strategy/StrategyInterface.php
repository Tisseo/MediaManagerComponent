<?php

namespace CanalTP\MediaManager\Strategy;

use CanalTP\MediaManager\Company\CompanyInterface;
use CanalTP\MediaManager\Category\CategoryInterface;

interface StrategyInterface
{
    public function generatePath($media);
    public function getMediasPathByCategory(
        CompanyInterface $company,
        CategoryInterface $category
    );
    public function findMedia(
        CompanyInterface $company,
        CategoryInterface $category,
        $mediaId
    );
    public function getRelativeCategoryPath(
        CompanyInterface $company,
        CategoryInterface $category
    );
}
