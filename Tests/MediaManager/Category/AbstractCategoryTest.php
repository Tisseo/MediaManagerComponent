<?php

require_once 'Object/MediaManager/Category/AbstractCategory.php';

class AbstractCategoryTest extends PHPUnit_Framework_TestCase
{
    private $stub = null;

    public function setUp()
    {
        $this->stub = $this->getMockForAbstractClass('AbstractCategory');
    }

    public function testSetAndGetName()
    {
        $this->assertEquals($this->stub->getName(), 'Unknown', 'The value name is not correctly initialized.');
        $this->stub->setName('Category');
        $this->assertEquals($this->stub->getName(), 'Category', 'The value name can\'t be set.');
    }
}