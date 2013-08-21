<?php

namespace CanalTP\MediaManager\Media\Factory;

use CanalTP\MediaManager\Media\MediaType;
use CanalTP\MediaManager\Media\Sound;
use CanalTP\MediaManager\Media\Picture;
use CanalTP\MediaManager\Media\Factory\MediaFactoryInterface;

class MediaFactory implements MediaFactoryInterface
{
    public function create($type)
    {
        $media = null;

        switch ($type) {
            case MediaType::SOUND:
            $media = new Sound();
            break;
            case MediaType::PICTURE:
            $media = new Picture();
            break;
        }
        return ($media);
    }
}
