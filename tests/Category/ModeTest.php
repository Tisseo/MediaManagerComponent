<?php

namespace CanalTP\MediaManager\Test\Category;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Category\ModeCategory;

class ModeTest extends \PHPUnit_Framework_TestCase
{
    private $mode = null;

    public function setUp()
    {
        $this->mode = new ModeCategory();
    }

    public function testInitialisation()
    {
        $this->assertInternalType('string', $this->mode->getName());
        $this->assertEquals(
            $this->mode->getName(), Registry::get('MODE_CATEGORY_NAME'),
            Registry::get('NOT_INIT')
        );
        $this->assertInternalType('array', $this->mode->getMedias());
        $this->assertInternalType('integer', $this->mode->getMediaNumber());
        $this->assertEquals(
            $this->mode->getMediaNumber(), 0,
            Registry::get('NOT_INIT')
        );
    }

    public function testSetAndGetName()
    {
        $this->assertEquals(
            $this->mode->getName(), Registry::get('MODE_CATEGORY_NAME'),
            Registry::get('NOT_INIT')
        );
        $this->mode->setName('Mode');
        $this->assertInternalType('string', $this->mode->getName());
        $this->assertEquals(
            $this->mode->getName(), 'Mode',
            Registry::get('NOT_SET')
        );
    }
}
