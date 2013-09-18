<?php

namespace CanalTP\MediaManager\Strategy;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Company\CompanyInterface;
use CanalTP\MediaManager\Category\CategoryInterface;
use CanalTP\MediaManager\Strategy\AbstractStrategy;

class DefaultStrategy extends AbstractStrategy
{
    public function generatePath($media)
    {
        $path = $media->getCompany()->getName() . '/';
        $path .= $media->getCategory()->getName() . '/';
        $path .= $media->getBaseName();

        return ($path);
    }

    private function findCategory($path, $type)
    {
        $results = array_diff(scandir($path), array('.', '..'));

        foreach ($results as $result) {
            $current_path = $path . '/' . $result;
            $is_dir = is_dir($current_path);

            if ($is_dir && $result == $type)
            {
                return ($current_path);
            }
            else if ($is_dir)
            {
                $this->findCategory($current_path, $type);
            }
        }
        return ($path);
    }

    public function getPathByCategory(
        CompanyInterface $company,
        CategoryInterface $category
    )
    {
        return ($this->findCategory(
            $company->getStorage()->getPath() . $company->getName(),
            $category->getName()
            )
        );
    }
}
