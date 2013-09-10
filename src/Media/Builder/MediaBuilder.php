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
        $file,
        CompanyInterface $company,
        CategoryInterface $category
        )
    {
        $mediaFactory = new MediaFactory();
        $this->media = $mediaFactory->create($file);

        $this->media->setFileName(pathinfo($file, PATHINFO_FILENAME));
        $this->media->setBaseName(pathinfo($file, PATHINFO_BASENAME));
        $this->media->setSize(filesize($file));
        $this->media->setPath($file);
        $this->media->setCompany($company);
        $this->media->setCategory($category);
        return ($this->getMedia());
    }
}
