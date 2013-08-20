<?php

require_once 'AbstractMedia.class.php';

class SoundType
{
	const UNKNOWN 	= 0;
	const MP3 		= 1;
	const M3U 		= 2;
	const XM 		= 3;
}

class Sound extends AbstractMedia
{
	public function __construct()
	{
		parent::__construct();

		$this->type = SoundType::UNKNOWN;
	}
}