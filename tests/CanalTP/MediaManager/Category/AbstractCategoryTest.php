<?php

namespace CanalTP\MediaManager\Test\Category;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Category\AbstractCategory;

class AbstractCategoryTest extends \PHPUnit_Framework_TestCase
{
    private $stub = null;

    public function setUp()
    {
        $namespace = 'CanalTP\MediaManager\Category\AbstractCategory';
        $this->stub = $this->getMockForAbstractClass($namespace);
    }

    public function testSetAndGetName()
    {
        $this->assertEquals(
            $this->stub->getName(), 'Unknown',
            Registry::get('NOT_INIT')
            );
        $this->stub->setName('Category');
        $this->assertEquals(
            $this->stub->getName(), 'Category',
            Registry::get('NOT_SET')
            );
    }
}
