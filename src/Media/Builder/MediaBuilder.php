<?php

namespace CanalTP\MediaManager\Media\Builder;

use CanalTP\MediaManager\Media\Builder\MediaBuilderInterface;
use CanalTP\MediaManager\Media\Factory\MediaFactory;
use CanalTP\MediaManager\Category\CategoryInterface;
use CanalTP\MediaManager\Company\CompanyInterface;

class MediaBuilder implements MediaBuilderInterface
{
    private $media = null;

    private function getMedia()
    {
        return ($this->media);
    }

    public function buildMedia(
        $path,
        CompanyInterface $company,
        CategoryInterface $category
        )
    {
        $mediaFactory = new MediaFactory();
        $this->media = $mediaFactory->create($path);

        $this->media->setFileName(pathinfo($path, PATHINFO_FILENAME));
        $this->media->setBaseName(pathinfo($path, PATHINFO_BASENAME));
        $this->media->setSize(filesize($path));
        $this->media->setPath($path);
        $this->media->setCompany($company);
        $this->media->setCategory($category);

        return ($this->getMedia());
    }
}
