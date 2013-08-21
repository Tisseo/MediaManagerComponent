<?php

namespace CanalTP\MediaManager\Test\Media;

use CanalTP\MediaManager\Media\MediaType;
use CanalTP\MediaManager\Media\PictureType;
use CanalTP\MediaManager\Media\Picture;

class PictureTest extends \PHPUnit_Framework_TestCase
{
    private $picture = null;

    public function setUp()
    {
        $this->picture = new Picture();
    }

    public function testInitialisation()
    {
        $this->assertInternalType('integer', $this->picture->getMediaType(),'The value mediaType is not correctly initialized. Check if parrent::__construct is present.');
        $this->assertEquals($this->picture->getMediaType(), MediaType::UNKNOWN, 'The value mediaType is not correctly initialized. Check if parrent::__construct is present.');
        $this->assertInternalType('integer', $this->picture->getType(), 'The value type is not correctly initialized.');
        $this->assertEquals($this->picture->getType(), PictureType::UNKNOWN, 'The value type is not correctly initialized.');
        $this->assertInternalType('integer', $this->picture->getSizeX(), 'The value sizeX is not correctly initialized.');
        $this->assertEquals($this->picture->getSizeX(), 0, 'The value sizeX is not correctly initialized.');
        $this->assertInternalType('integer', $this->picture->getSizeY(), 'The value sizeY is not correctly initialized.');
        $this->assertEquals($this->picture->getSizeY(), 0, 'The value sizeY is not correctly initialized.');
    }

    public function testSetAndGetType()
    {
        $type = $this->picture->getType();

        $this->assertInternalType('integer', $type);
        $this->assertEquals($type, PictureType::UNKNOWN, 'The value type is not correctly initialized.');
        $this->picture->setType(PictureType::JPG);
        $this->assertEquals($this->picture->getType(), PictureType::JPG, 'The value type can\'t be set.');
    }

    public function testSetAndGetSizeX()
    {
        $sizeX = $this->picture->getSizeX();

        $this->assertInternalType('integer', $sizeX);
        $this->assertEquals($sizeX, 0, 'The value sizeX is not correctly initialized.');
        $this->picture->setSizeX(42);
        $this->assertEquals($this->picture->getSizeX(), 42, 'The value sizeX can\'t be set.');
    }

    public function testSetAndGetSizeY()
    {
        $sizeY = $this->picture->getSizeY();

        $this->assertInternalType('integer', $sizeY);
        $this->assertEquals($sizeY, 0, 'The value sizeY is not correctly initialized.');
        $this->picture->setSizeY(42);
        $this->assertEquals($this->picture->getSizeY(), 42, 'The value sizeY can\'t be set.');
    }

}