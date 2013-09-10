<?php

namespace CanalTP\MediaManager\Test\Media;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Media\MediaType;
use CanalTP\MediaManager\Media\PictureMediaType;
use CanalTP\MediaManager\Media\PictureMedia;

class PictureMediaTest extends \PHPUnit_Framework_TestCase
{
    private $picture = null;

    public function setUp()
    {
        $this->picture = new PictureMedia();
    }

    public function testInitialisation()
    {
        $this->assertInternalType(
            'integer', $this->picture->getMediaType(),
            Registry::get('NOT_CORRECT')
        );
        $this->assertEquals(
            $this->picture->getMediaType(), MediaType::PICTURE,
            Registry::get('NOT_CORRECT')
        );
        $this->assertInternalType(
            'integer', $this->picture->getType(),
            Registry::get('NOT_INIT')
        );
        $this->assertEquals(
            $this->picture->getType(), PictureMediaType::UNKNOWN,
            Registry::get('NOT_INIT')
        );
        $this->assertInternalType(
            'integer', $this->picture->getWidth(),
            Registry::get('NOT_INIT')
        );
        $this->assertEquals(
            $this->picture->getWidth(), 0,
            Registry::get('NOT_INIT')
        );
        $this->assertInternalType(
            'integer', $this->picture->getLength(),
            Registry::get('NOT_INIT')
        );
        $this->assertEquals(
            $this->picture->getLength(), 0,
            Registry::get('NOT_INIT')
        );
    }

    public function testSetAndGetType()
    {
        $type = $this->picture->getType();

        $this->assertInternalType('integer', $type);
        $this->assertEquals(
            $type, PictureMediaType::UNKNOWN,
            Registry::get('NOT_INIT')
        );
        $this->picture->setType(PictureMediaType::JPG);
        $this->assertEquals(
            $this->picture->getType(), PictureMediaType::JPG,
            Registry::get('NOT_SET')
        );
    }

    public function testSetAndGetWidth()
    {
        $width = $this->picture->getWidth();

        $this->assertInternalType('integer', $width);
        $this->assertEquals($width, 0, Registry::get('NOT_INIT'));
        $this->picture->setWidth(42);
        $this->assertEquals(
            $this->picture->getWidth(), 42,
            Registry::get('NOT_SET')
        );
    }

    public function testSetAndGetLength()
    {
        $length = $this->picture->getLength();

        $this->assertInternalType('integer', $length);
        $this->assertEquals($length, 0, Registry::get('NOT_INIT'));
        $this->picture->setLength(42);
        $this->assertEquals(
            $this->picture->getLength(), 42,
            Registry::get('NOT_SET')
        );
    }
}
