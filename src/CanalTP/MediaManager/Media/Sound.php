<?php

namespace CanalTP\MediaManager\Media;

use CanalTP\MediaManager\Media\SoundType;
use CanalTP\MediaManager\Media\AbstractMedia;

class Sound extends AbstractMedia
{
    public function __construct()
    {
        parent::__construct();

        $this->type = SoundType::UNKNOWN;
    }
}
