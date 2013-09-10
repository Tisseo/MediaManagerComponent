<?php

namespace CanalTP\MediaManager\Test\Category;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Media\Factory\MediaFactory;
use CanalTP\MediaManager\Category\AbstractCategory;

class AbstractCategoryTest extends \PHPUnit_Framework_TestCase
{
    private $stub = null;

    public function setUp()
    {
        $namespace = 'CanalTP\MediaManager\Category\AbstractCategory';
        $this->stub = $this->getMockForAbstractClass($namespace);
    }

    public function testInitialisation()
    {
        $this->assertEquals(
            $this->stub->getName(), 'Unknown',
            Registry::get('NOT_INIT')
        );
    }

    public function testSetAndGetName()
    {
        $this->stub->setName('Category');
        $this->assertEquals(
            $this->stub->getName(), 'Category',
            Registry::get('NOT_SET')
        );
    }

    public function testAddMedia()
    {
        $sFile = Registry::get('/') . Registry::get('SOUND_TEST');
        $pFile = Registry::get('/') . Registry::get('PICTURE_TEST');
        $factory = new MediaFactory();
        $sound = $factory->create($sFile);
        $picture = $factory->create($pFile);

        $this->stub->addMedia($sound);
        $this->assertEquals(
            $this->stub->getMediaNumber(), 1,
            Registry::get('CATEGORY_ADD_MEDIA')
        );
        $this->stub->addMedia($picture);
        $this->assertEquals(
            $this->stub->getMediaNumber(), 2,
            Registry::get('CATEGORY_ADD_MEDIA')
        );
    }
}
