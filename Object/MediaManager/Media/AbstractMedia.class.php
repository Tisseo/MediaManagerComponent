<?php

require_once 'IMedia.class.php';

class MediaType
{
	const UNKNOWN 	= 0;
	const SOUND 	= 1;
	const PICTURE	= 2;
}

abstract class AbstractMedia implements iMedia
{
	protected
	  $company = null,
	  $category = null,
	  $type = 0,
	  $mediaType = null,
	  $size = null,
	  $expirationDate = 0,
	  $path = null;

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

	public function setCategory(ICategory $category)
	{
		$this->category = $category;
	}
}