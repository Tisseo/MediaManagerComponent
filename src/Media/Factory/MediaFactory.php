<?php

namespace CanalTP\MediaManager\Media\Factory;

use CanalTP\MediaManager\Media\MediaType;
use CanalTP\MediaManager\Media\SoundMedia;
use CanalTP\MediaManager\Media\PictureMedia;
use CanalTP\MediaManager\Media\Factory\MediaFactoryInterface;

class MediaFactory implements MediaFactoryInterface
{
    private $mime = null;
    private $type = null;

    private function analyse($fileName)
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $this->mime = finfo_file($finfo, $fileName);
        finfo_close($finfo);
    }

    private function determine()
    {
        $this->type = null;

        switch ($this->mime) {
            case 'image/jpeg':
                $this->type = MediaType::PICTURE;
                break;
            case 'audio/mpeg':
                $this->type = MediaType::SOUND;
                break;
        }
    }

    private function product()
    {
        $media = null;

        switch ($this->type) {
            case MediaType::SOUND:
                $media = new SoundMedia();
                break;
            case MediaType::PICTURE:
                $media = new PictureMedia();
                break;
        }

        return ($media);
    }

    public function create($fileName)
    {
        $this->analyse($fileName);
        $this->determine();

        return ($this->product());
    }
}
