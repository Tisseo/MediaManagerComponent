<?php

namespace CanalTP\MediaManager\Test\Media;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Media\MediaType;
use CanalTP\MediaManager\Media\SoundMediaType;
use CanalTP\MediaManager\Media\SoundMedia;

class SoundMediaTest extends \PHPUnit_Framework_TestCase
{
    private $sound = null;

    public function setUp()
    {
        $this->sound = new SoundMedia();
    }

    public function testInitialisation()
    {
        $this->assertInternalType(
            'integer', $this->sound->getMediaType(),
            Registry::get('NOT_CORRECT')
        );
        $this->assertEquals(
            $this->sound->getMediaType(),
            MediaType::UNKNOWN, Registry::get('NOT_CORRECT')
        );
        $this->assertInternalType(
            'integer', $this->sound->getType(),
            Registry::get('NOT_INIT')
        );
        $this->assertEquals(
            $this->sound->getType(), SoundMediaType::UNKNOWN,
            Registry::get('NOT_INIT')
        );
    }

    public function testSetAndGetType()
    {
        $type = $this->sound->getType();

        $this->assertInternalType('integer', $type);
        $this->assertEquals(
            $type, SoundMediaType::UNKNOWN,
            Registry::get('NOT_INIT')
        );
        $this->sound->setType(SoundMediaType::MP3);
        $this->assertEquals(
            $this->sound->getType(), SoundMediaType::MP3,
            Registry::get('NOT_SET')
        );
    }
}
