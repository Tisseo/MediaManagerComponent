<?php

namespace CanalTP\MediaManager\Category;

use CanalTP\MediaManager\Category\CategoryInterface;

abstract class AbstractCategory implements CategoryInterface
{
    protected $name = null;
    protected $medias = null;

    public function __construct()
    {
        $this->name = 'Unknown';
        $this->medias = array();
    }

    public function getName()
    {
        return ($this->name);
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getMediaArray()
    {
        return ($this->medias);
    }

    public function addMedia(MediaInterface $media)
    {
        array_push($this->medias, $media);
    }

    public function getMediaNumber()
    {
        return (count($this->medias));
    }
}
