<?php

namespace CanalTP\MediaManager\Category;

use CanalTP\MediaManager\Category\AbstractCategory;

class LogoCategory extends AbstractCategory
{
    public function __construct()
    {
        parent::__construct();

        $this->id = 'logo';
        $this->name = 'Logo';
        $this->ressourceId = 'logos';
    }
}
