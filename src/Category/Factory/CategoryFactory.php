<?php

namespace CanalTP\MediaManager\Category\Factory;

use CanalTP\MediaManager\Category\Factory\CategoryFactoryInterface;
use CanalTP\MediaManager\Category\CategoryType;
use CanalTP\MediaManager\Category\LineCategory;
use CanalTP\MediaManager\Category\LogoCategory;
use CanalTP\MediaManager\Category\NetworkCategory;


class CategoryFactory implements CategoryFactoryInterface
{
    private function product($type)
    {
        $category = null;

        switch ($type) {
            case CategoryType::LINE:
                $category = new LineCategory();
                break;
            case CategoryType::LOGO:
                $category = new LogoCategory();
                break;
            case CategoryType::NETWORK:
                $category = new NetworkCategory();
                break;
        }
        return ($category);
    }

    public function create($type)
    {
        return ($this->product($type));
    }
}
