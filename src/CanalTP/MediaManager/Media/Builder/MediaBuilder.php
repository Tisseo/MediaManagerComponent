<?php

namespace CanalTP\MediaManager\Media\Builder;

use CanalTP\MediaManager\Media\Builder\MediaBuilderInterface;
use CanalTP\MediaManager\Media\Factory\MediaFactory;
use CanalTP\MediaManager\Category\CategoryInterface;
use CanalTP\MediaManager\Company\CompanyInterface;

class MediaBuilder implements MediaBuilderInterface
{
    private $media = null;

    public function buildMedia(
        $file,
        CompanyInterface $company,
        CategoryInterface $category
        )
    {
        $mediaFactory = new MediaFactory();
        $this->media = $mediaFactory->create($file);

        $this->media->setPath($file);
        $this->media->setCompany($company);
        $this->media->setCategory($category);
    }

    public function getMedia()
    {
        return ($this->media);
    }
}