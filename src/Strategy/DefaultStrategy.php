<?php

namespace CanalTP\MediaManager\Strategy;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Company\CompanyInterface;
use CanalTP\MediaManager\Category\CategoryInterface;
use CanalTP\MediaManager\Strategy\AbstractStrategy;

class DefaultStrategy extends AbstractStrategy
{

    private function buildPath($path, $category)
    {
        if ($category->getParent()) {
            $path .= $this->buildPath($path, $category->getParent());
        }
        $path .= $category->getName() . '/';

        return ($path);
    }

    public function generatePath($media)
    {
        $category = $media->getCategory();
        $path = $media->getCompany()->getName() . '/';

        $path .= $this->buildPath("", $category);
        $path .= $media->getBaseName();
        return ($path);
    }

    private function findCategory($path, $type)
    {
        $results = array_diff(scandir($path), array('.', '..'));

        foreach ($results as $result) {
            $current_path = $path . '/' . $result;
            $is_dir = is_dir($current_path);

            if ($is_dir && $result == $type) {
                return ($current_path);
            } elseif ($is_dir) {
                $this->findCategory($current_path, $type);
            }
        }
        return ($path);
    }

    public function getMediasPathByCategory(
        CompanyInterface $company,
        CategoryInterface $category
    )
    {
        $medias = array();
        
        if (!file_exists($company->getStorage()->getPath())) {
            return ($medias);
        }
        
        $dir = $this->findCategory(
            $company->getStorage()->getPath() . $company->getName(),
            $category->getId()
        );
        $categories = array_diff(scandir($dir), array('..', '.'));
        

        foreach ($categories as $category) {
            $directory = $dir . '/' . $category;
            $files = array_diff(scandir($directory), array('..', '.'));

            foreach ($files as $file) {
                $media = $directory . '/' . $file;

                if (!is_dir($media)) {
                    array_push($medias, $media);
                }
            }
        }
        return ($medias);
    }
}
