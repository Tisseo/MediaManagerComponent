<?php

namespace CanalTP\MediaManager\Media;

require_once 'MediaType.php';
require_once 'MediaInterface.php';

abstract class AbstractMedia implements MediaInterface
{
    protected $company = null;
    protected $category = null;
    protected $type = 0;
    protected $mediaType = null;
    protected $size = null;
    protected $expirationDate = 0;
    protected $path = null;

    public function __construct()
    {
        $this->mediaType = MediaType::UNKNOWN;
        $this->size = 0;
    }

    public function getType()
    {
        return ($this->type);
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getMediaType()
    {
        return ($this->mediaType);
    }

    public function setMediaType($type)
    {
        $this->mediaType = $type;
    }

    public function getSize()
    {
        return ($this->size);
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getExpirationDate()
    {
        return ($this->expirationDate);
    }

    public function setExpirationDate($date)
    {
        $this->expirationDate = $date;
    }

    public function getPath()
    {
        return ($this->path);
    }

    public function setPath($path)
    {
        $this->path = $path;
    }

    public function getCompany()
    {
        return ($this->company);
    }

    public function setCompany($company)
    {
        $this->company = $company;
    }

    public function getCategory()
    {
        return ($this->category);
    }

    public function setCategory(CategoryInterface $category)
    {
        $this->category = $category;
    }
}
