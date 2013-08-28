<?php

namespace CanalTP\MediaManager\Media\Builder;

use CanalTP\MediaManager\Category\CategoryInterface;
use CanalTP\MediaManager\Company\CompanyInterface;

interface MediaBuilderInterface
{
    public function buildMedia(
        $files,
        CompanyInterface $company,
        CategoryInterface $category
        );
    public function getMedia();
}