<?php

namespace CanalTP\MediaManager\Test\Media;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Media\MediaType;
use CanalTP\MediaManager\Media\SoundType;
use CanalTP\MediaManager\Media\Sound;

class SoundTest extends \PHPUnit_Framework_TestCase
{
    private $sound = null;

    public function setUp()
    {
        $this->sound = new Sound();
    }

    public function testInitialisation()
    {
        $this->assertInternalType('integer', $this->sound->getMediaType(),
            Registry::get('NOT_CORRECT'));
        $this->assertEquals($this->sound->getMediaType(),
            MediaType::UNKNOWN, Registry::get('NOT_CORRECT'));
        $this->assertInternalType('integer', $this->sound->getType(),
            Registry::get('NOT_INIT'));
        $this->assertEquals($this->sound->getType(), SoundType::UNKNOWN,
            Registry::get('NOT_INIT'));
    }

    public function testSetAndGetType()
    {
        $type = $this->sound->getType();

        $this->assertInternalType('integer', $type);
        $this->assertEquals($type, SoundType::UNKNOWN,
            Registry::get('NOT_INIT'));
        $this->sound->setType(SoundType::MP3);
        $this->assertEquals($this->sound->getType(), SoundType::MP3,
            Registry::get('NOT_SET'));
    }
}
