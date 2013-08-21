<?php

namespace CanalTP\MediaManager\Media;

require_once 'SoundType.php';
require_once 'AbstractMedia.php';

class Sound extends AbstractMedia
{
    public function __construct()
    {
        parent::__construct();

        $this->type = SoundType::UNKNOWN;
    }
}
