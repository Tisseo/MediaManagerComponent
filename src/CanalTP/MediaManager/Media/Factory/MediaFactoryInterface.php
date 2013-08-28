<?php

namespace CanalTP\MediaManager\Media\Factory;

use CanalTP\MediaManager\Media\MediaType;

interface MediaFactoryInterface
{
    public function create($fileName);
}
