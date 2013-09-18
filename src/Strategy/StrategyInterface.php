<?php

namespace CanalTP\MediaManager\Strategy;

use CanalTP\MediaManager\Company\CompanyInterface;
use CanalTP\MediaManager\Category\CategoryInterface;

interface StrategyInterface
{
    public function generatePath($media);
    public function getPathByCategory(
        CompanyInterface $company,
        CategoryInterface $category
    );
}
