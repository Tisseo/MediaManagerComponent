<?php

namespace CanalTP\MediaManager\Media;

use CanalTP\MediaManager\Media\SoundMediaType;
use CanalTP\MediaManager\Media\AbstractMedia;

class SoundMedia extends AbstractMedia
{
    public function __construct()
    {
        parent::__construct();

        $this->type = SoundMediaType::UNKNOWN;
    }
}
