<?php

namespace CanalTP\MediaManager\Category;

use CanalTP\MediaManager\Category\AbstractCategory;

class NetworkCategory extends AbstractCategory
{
    public function __construct()
    {
        parent::__construct();

        $this->id = 'network';
        $this->name = 'Network';
    }
}
