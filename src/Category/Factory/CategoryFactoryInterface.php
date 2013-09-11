<?php

namespace CanalTP\MediaManager\Category\Factory;

use CanalTP\MediaManager\Category\CategoryType;

interface CategoryFactoryInterface
{
    public function create($type);
}
