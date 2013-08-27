<?php

namespace CanalTP\MediaManager\Category;

use CanalTP\MediaManager\Media\MediaInterface;

interface CategoryInterface
{
    public function getMediaArray();
    public function addMedia(MediaInterface $media);
    public function getMediaNumber();

    public function getName();
    public function setName($name);
}
