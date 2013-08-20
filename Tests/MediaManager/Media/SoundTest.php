<?php

require_once 'Object/MediaManager/Media/AbstractMedia.class.php';
require_once 'Object/MediaManager/Media/Sound.class.php';

class SoundTest extends PHPUnit_Framework_TestCase
{
	private
	  $sound;

	public function setUp()
	{
		$this->sound = new Sound();
	}

	public function testInitialisation()
	{
		$this->assertInternalType('integer', $this->sound->getMediaType(), 'The value mediaType is not correctly initialized. Check if parrent::__construct is present.');
		$this->assertEquals($this->sound->getMediaType(), MediaType::UNKNOWN, 'The value mediaType is not correctly initialized. Check if parrent::__construct is present.');
		$this->assertInternalType('integer', $this->sound->getType(), 'The value type is not correctly initialized.');
		$this->assertEquals($this->sound->getType(), SoundType::UNKNOWN, 'The value type is not correctly initialized.');
	}

	public function testSetAndGetType()
	{
		$type = $this->sound->getType();

		$this->assertInternalType('integer', $type);
		$this->assertEquals($type, SoundType::UNKNOWN, 'The value type is not correctly initialized.');
		$this->sound->setType(SoundType::MP3);
		$this->assertEquals($this->sound->getType(), SoundType::MP3, 'The value type can\'t be set.');
	}
}