<?php

namespace CanalTP\MediaManager\Test\Category\Factory;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Category\CategoryType;
use CanalTP\MediaManager\Category\Factory\CategoryFactory;

class CategoryFactoryTest extends \PHPUnit_Framework_TestCase
{
    private $factory;

    public function setUp()
    {
        $this->factory = new CategoryFactory();
    }

    public function testInstanciation()
    {
        $this->assertInstanceOf(
            'CanalTP\MediaManager\Category\LogoCategory',
            $this->factory->create(CategoryType::LOGO),
            Registry::get('FACTORY_CREATE')
        );
        $this->assertInstanceOf(
            'CanalTP\MediaManager\Category\LineCategory',
            $this->factory->create(CategoryType::LINE),
            Registry::get('FACTORY_CREATE')
        );
        $this->assertInstanceOf(
            'CanalTP\MediaManager\Category\NetworkCategory',
            $this->factory->create(CategoryType::NETWORK),
            Registry::get('FACTORY_CREATE')
        );
        $this->assertInstanceOf(
            'CanalTP\MediaManager\Category\ModeCategory',
            $this->factory->create(CategoryType::MODE),
            Registry::get('FACTORY_CREATE')
        );
    }
}
