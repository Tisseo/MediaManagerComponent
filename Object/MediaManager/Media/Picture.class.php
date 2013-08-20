<?php

require_once 'AbstractMedia.class.php';

class PictureType
{
	const UNKNOWN 	= 0;
	const JPG 		= 1;
	const PNG 		= 2;
	const ICO 		= 3;
}

class Picture extends AbstractMedia
{
	private
	  $sizeX = null,
	  $sizeY = null;

	public function __construct()
	{
		parent::__construct();

		$this->type = PictureType::UNKNOWN;
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