<?php

namespace CanalTP\MediaManager\Strategy;

use CanalTP\MediaManager\Company\CompanyInterface;
use CanalTP\MediaManager\Category\CategoryInterface;
use CanalTP\MediaManager\Strategy\AbstractStrategy;

class NavitiaStrategy extends AbstractStrategy
{
    private function getSimRessourceName()
    {
        return ('sims');
    }

    public function generatePath($media)
    {
        $path = $this->getSimRessourceName() . '/';
        $path .= $media->getCompany()->getId() . '/';
        $path .= $media->getCategory()->getRessourceId() . '/';
        $path .= $media->getBaseName();

        return ($path);
    }

    public function getMediasPathByCategory(
        CompanyInterface $company,
        CategoryInterface $category
    )
    {
        $path = $company->getStorage()->getPath();
        $path .= $this->getSimRessourceName() . '/';
        $path .= $company->getId() . '/';
        $path .= $category->getRessourceId();

        if (!file_exists($path)) {
            return ;
        }

        $files = array_diff(scandir($path), array('..', '.'));
        $medias = array();

        foreach ($files as $file) {
            $mediaPath = $path . '/' . $file;

            if (!is_dir($mediaPath)) {
                array_push($medias, $mediaPath);
            }
        }

        return ($medias);
    }

    public function findMedia(
        CompanyInterface $company,
        CategoryInterface $category,
        $mediaId
    )
    {
        $path = $company->getStorage()->getPath();
        $path .= $this->getSimRessourceName() . '/';
        $path .= $company->getId() . '/';
        $path .= $category->getRessourceId();

        if (!file_exists($path)) {
            return ;
        }

        $files = array_diff(scandir($path), array('..', '.'));

        foreach ($files as $file) {
            $mediaPath = $path . '/' . $file;
            $mediaId = pathinfo($mediaId, PATHINFO_FILENAME);

            if (is_dir($mediaPath)) {
                continue ;
            }
            if (pathinfo($file, PATHINFO_FILENAME) == $mediaId) {
                return ($mediaPath);
            }
        }

        return (null);
    }
}
