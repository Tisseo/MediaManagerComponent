<?php

namespace CanalTP\MediaManager\Media;

use CanalTP\MediaManager\Media\AbstractMedia;
use CanalTP\MediaManager\Media\MediaType;

class PdfMedia extends AbstractMedia
{
    public function __construct()
    {
        parent::__construct();

        $this->mediaType = MediaType::PDF;
        $this->type = MediaType::PDF;
    }
}
