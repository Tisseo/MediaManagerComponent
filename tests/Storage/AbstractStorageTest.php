<?php

namespace CanalTP\MediaManager\Test\Media;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Storage\AbstractStorage;

class AbstractStorageTest extends \PHPUnit_Framework_TestCase
{
    private $stub = null;

    protected function setUp()
    {
        $namespace = 'CanalTP\MediaManager\Storage\AbstractStorage';
        $this->stub = $this->getMockForAbstractClass($namespace);
    }

    public function testSetAndGetMediaType()
    {
        $path = $this->stub->getPath();

        $this->assertInternalType('string', $path);
        $this->assertEquals(
            $path, '',
            Registry::get('NOT_INIT')
        );
        $this->stub->setPath(Registry::get('DATA_DIR'));
        $this->assertEquals(
            $this->stub->getPath(), Registry::get('DATA_DIR'),
            Registry::get('NOT_SET')
        );
    }
}
