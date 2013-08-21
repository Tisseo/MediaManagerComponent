<?php

namespace CanalTP\MediaManager\Test\Media;

use CanalTP\MediaManager\Registry;
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
        $this->assertInternalType(
            'integer', $this->picture->getMediaType(),
            Registry::get('NOT_CORRECT')
            );
        $this->assertEquals(
            $this->picture->getMediaType(), MediaType::UNKNOWN,
            Registry::get('NOT_CORRECT')
            );
        $this->assertInternalType(
            'integer', $this->picture->getType(),
            Registry::get('NOT_INIT')
            );
        $this->assertEquals(
            $this->picture->getType(), PictureType::UNKNOWN,
            Registry::get('NOT_INIT')
            );
        $this->assertInternalType(
            'integer', $this->picture->getSizeX(),
            Registry::get('NOT_INIT')
            );
        $this->assertEquals(
            $this->picture->getSizeX(), 0,
            Registry::get('NOT_INIT')
            );
        $this->assertInternalType(
            'integer', $this->picture->getSizeY(),
            Registry::get('NOT_INIT')
            );
        $this->assertEquals(
            $this->picture->getSizeY(), 0,
            Registry::get('NOT_INIT')
            );
    }

    public function testSetAndGetType()
    {
        $type = $this->picture->getType();

        $this->assertInternalType('integer', $type);
        $this->assertEquals(
            $type, PictureType::UNKNOWN,
            Registry::get('NOT_INIT')
            );
        $this->picture->setType(PictureType::JPG);
        $this->assertEquals(
            $this->picture->getType(), PictureType::JPG,
            Registry::get('NOT_SET')
            );
    }

    public function testSetAndGetSizeX()
    {
        $sizeX = $this->picture->getSizeX();

        $this->assertInternalType('integer', $sizeX);
        $this->assertEquals($sizeX, 0, Registry::get('NOT_INIT'));
        $this->picture->setSizeX(42);
        $this->assertEquals(
            $this->picture->getSizeX(), 42,
            Registry::get('NOT_SET')
            );
    }

    public function testSetAndGetSizeY()
    {
        $sizeY = $this->picture->getSizeY();

        $this->assertInternalType('integer', $sizeY);
        $this->assertEquals($sizeY, 0, Registry::get('NOT_INIT'));
        $this->picture->setSizeY(42);
        $this->assertEquals(
            $this->picture->getSizeY(), 42,
            Registry::get('NOT_SET')
            );
    }
}
