<?php

namespace CanalTP\MediaManager\Media;

use CanalTP\MediaManager\Category\CategoryInterface;
use CanalTP\MediaManager\Company\CompanyInterface;
use CanalTP\MediaManager\Media\MediaInterface;
use CanalTP\MediaManager\Media\MediaType;

abstract class AbstractMedia implements MediaInterface
{
    protected $company = null;
    protected $category = null;
    protected $fileName = null;
    protected $baseName = null;
    protected $extension = null;
    protected $type = 0;
    protected $mediaType = null;
    protected $size = null;
    protected $expirationDate = 0;
    protected $path = null;

    public function __construct()
    {
        $this->fileName = 'Unknown';
        $this->baseName = 'Unknown';
        $this->extension = 'Unknown';
        $this->mediaType = MediaType::UNKNOWN;
        $this->size = 0;
    }

    public function getFileName()
    {
        return ($this->fileName);
    }

    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    public function getBaseName()
    {
        return ($this->baseName);
    }

    public function setBaseName($baseName)
    {
        $this->baseName = $baseName;
        $this->setExtension(pathinfo($baseName, PATHINFO_EXTENSION));
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

    public function getExtension()
    {
        return ($this->extension);
    }

    public function setExtension($extension)
    {
        $this->extension = $extension;
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

    public function setCompany(CompanyInterface $company)
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
