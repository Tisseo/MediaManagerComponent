<?php

namespace CanalTP\MediaManager\Category;

use CanalTP\MediaManager\Media\MediaInterface;

interface CategoryInterface
{
    public function getMedias();
    public function addMedia(MediaInterface $media);
    public function getMediaNumber();

    public function getName();
    public function setName($name);

    public function getId();
    public function setId($id);

    public function getParent();
    public function setParent($category);
}
