<?php

namespace CanalTP\MediaManager\Media;

use CanalTP\MediaManager\Media\PictureMediaType;
use CanalTP\MediaManager\Media\AbstractMedia;

class PictureMedia extends AbstractMedia
{
    private $sizeX = null;
    private $sizeY = null;

    public function __construct()
    {
        parent::__construct();

        $this->type = PictureMediaType::UNKNOWN;
        $this->sizeX = 0;
        $this->sizeY = 0;
    }

    public function getSizeX()
    {
        return ($this->sizeX);
    }

    public function setSizeX($sizeX)
    {
        $this->sizeX = $sizeX;
    }

    public function getSizeY()
    {
        return ($this->sizeY);
    }

    public function setSizeY($sizeY)
    {
        $this->sizeY = $sizeY;
    }
}
