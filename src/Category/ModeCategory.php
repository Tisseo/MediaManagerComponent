<?php

namespace CanalTP\MediaManager\Category;

use CanalTP\MediaManager\Category\AbstractCategory;

class ModeCategory extends AbstractCategory
{
    public function __construct()
    {
        parent::__construct();

        $this->id = 'mode';
        $this->name = 'Mode';
        $this->ressourceId = 'modes';
    }
}
