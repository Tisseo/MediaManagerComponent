<?php

namespace CanalTP\MediaManager\Test\Category;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Category\LogoCategory;

class LogoTest extends \PHPUnit_Framework_TestCase
{
    private $logo = null;

    public function setUp()
    {
        $this->logo = new LogoCategory();
    }

    public function testInitialisation()
    {
        $this->assertInternalType('string', $this->logo->getName());
        $this->assertEquals(
            $this->logo->getName(), Registry::get('LOGO_CATEGORY_NAME'),
            Registry::get('NOT_INIT')
        );
        $this->assertInternalType('array', $this->logo->getMedias());
        $this->assertInternalType('integer', $this->logo->getMediaNumber());
        $this->assertEquals(
            $this->logo->getMediaNumber(), 0,
            Registry::get('NOT_INIT')
        );
    }

    public function testSetAndGetName()
    {
        $this->assertEquals(
            $this->logo->getName(), Registry::get('LOGO_CATEGORY_NAME'),
            Registry::get('NOT_INIT')
        );
        $this->logo->setName('Logo');
        $this->assertInternalType('string', $this->logo->getName());
        $this->assertEquals(
            $this->logo->getName(), 'Logo',
            Registry::get('NOT_SET')
        );
    }
}
