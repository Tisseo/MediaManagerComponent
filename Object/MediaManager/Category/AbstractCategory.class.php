<?php

require_once 'ICategory.class.php';

abstract class AbstractCategory implements iCategory
{
	protected
	  $name = null,
	  $medias = null;

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

	public function addMedia(IMedia $media)
	{
		array_push($this->medias, $media);
	}

	public function getMediaNumber()
	{
		return (count($this->medias));
	}
}