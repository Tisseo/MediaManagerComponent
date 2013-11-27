<?php

namespace CanalTP\MediaManager\Category;

use CanalTP\MediaManager\Media\MediaInterface;
use CanalTP\MediaManager\Category\CategoryInterface;

abstract class AbstractCategory implements CategoryInterface
{
    protected $id = null;
    protected $name = null;
    protected $ressourceId = null;
    protected $medias = null;
    protected $parent = null;

    public function __construct()
    {
        $this->id = 'Unknown';
        $this->name = 'Unknown';
        $this->ressourceId = 'Unknown';
        $this->parent = false;
        $this->medias = array();
    }

    public function getId()
    {
        return ($this->id);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return ($this->name);
    }

    public function getRessourceId()
    {
        return ($this->ressourceId);
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getParent()
    {
        return ($this->parent);
    }

    public function setParent(CategoryInterface $category)
    {
        $this->parent = $category;
    }

    public function getMedias()
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
