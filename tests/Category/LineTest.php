<?php

namespace CanalTP\MediaManager\Test\Category;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Category\LineCategory;

class LineTest extends \PHPUnit_Framework_TestCase
{
    private $line = null;

    public function setUp()
    {
        $this->line = new LineCategory();
    }

    public function testInitialisation()
    {
        $this->assertInternalType('string', $this->line->getName());
        $this->assertEquals(
            $this->line->getName(), 'Unknown',
            Registry::get('NOT_INIT')
        );
        $this->assertInternalType('array', $this->line->getMediaArray());
        $this->assertInternalType('integer', $this->line->getMediaNumber());
        $this->assertEquals(
            $this->line->getMediaNumber(), 0,
            Registry::get('NOT_INIT')
        );
    }

    public function testSetAndGetName()
    {
        $this->assertEquals(
            $this->line->getName(), 'Unknown',
            Registry::get('NOT_INIT')
        );
        $this->line->setName('Line');
        $this->assertInternalType('string', $this->line->getName());
        $this->assertEquals(
            $this->line->getName(), 'Line',
            Registry::get('NOT_SET')
        );
    }
}
