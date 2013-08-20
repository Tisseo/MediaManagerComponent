<?php

require_once 'Object/MediaManager/Category/Line.class.php';

class LineTest extends PHPUnit_Framework_TestCase
{
	private
	  $line;

	public function setUp()
	{
		$this->line = new Line();
	}

	public function testInitialisation()
	{
		$this->assertInternalType('string', $this->line->getName());
		$this->assertEquals($this->line->getName(), 'Unknown', 'The value name is not correctly initialized.');
		$this->assertInternalType('array', $this->line->getMediaArray());
		$this->assertInternalType('integer', $this->line->getMediaNumber());
		$this->assertEquals($this->line->getMediaNumber(), 0, 'The value medias is not correctly initialized.');
	}

	public function testSetAndGetName()
	{
		$this->assertEquals($this->line->getName(), 'Unknown', 'The value name is not correctly initialized.');
		$this->line->setName('Line');
		$this->assertInternalType('string', $this->line->getName());
		$this->assertEquals($this->line->getName(), 'Line', 'The value name can\'t be set.');
	}
}