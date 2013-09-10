<?php

namespace CanalTP\MediaManager\Test\Media\Factory;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Media\MediaType;
use CanalTP\MediaManager\Media\Factory\MediaFactory;

class PictureTest extends \PHPUnit_Framework_TestCase
{
    private $factory;

    public function setUp()
    {
        $this->factory = new MediaFactory();
    }

    public function testInstanciation()
    {
        $baseDir = Registry::get('/');

        $this->assertInstanceOf(
            'CanalTP\MediaManager\Media\SoundMedia',
            $this->factory->create($baseDir . Registry::get('SOUND_TEST')),
            Registry::get('FACTORY_CREATE')
        );
        $this->assertInstanceOf(
            'CanalTP\MediaManager\Media\PictureMedia',
            $this->factory->create($baseDir . Registry::get('PICTURE_TEST')),
            Registry::get('FACTORY_CREATE')
        );
    }
}
