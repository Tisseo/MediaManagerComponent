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
        $this->assertInstanceOf(
            'CanalTP\MediaManager\Media\Sound',
            $this->factory->create(MediaType::SOUND),
            Registry::get('FACTORY_NEW')
        );
        $this->assertInstanceOf(
            'CanalTP\MediaManager\Media\Picture',
            $this->factory->create(MediaType::PICTURE),
            Registry::get('FACTORY_NEW')
        );
    }
}
