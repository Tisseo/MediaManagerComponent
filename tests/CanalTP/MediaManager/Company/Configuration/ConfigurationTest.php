<?php

namespace CanalTP\MediaManager\Test\Company\Configuration;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Company\Configuration\Configuration;
use CanalTP\MediaManager\Storage\FileSystem;
use CanalTP\MediaManager\Strategy\DefaultStrategy;
use CanalTP\MediaManager\Storage\StorageInterface;
use CanalTP\MediaManager\Strategy\StrategyInterface;

class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    private $configuration = null;

    public function setUp()
    {
        $this->configuration = new Configuration();
    }

    public function testSetAndGetStorage()
    {
        $this->assertNull(
            $this->configuration->getStorage(),
            Registry::get('NOT_INIT')
        );
        $this->configuration->setStorage(new FileSystem());
        $this->assertInstanceOf(
            'CanalTP\MediaManager\Storage\StorageInterface',
            $this->configuration->getStorage()
        );
    }

    public function testSetAndGetStrategy()
    {
        $this->assertNull(
            $this->configuration->getStrategy(),
            Registry::get('NOT_INIT')
        );
        $this->configuration->setStrategy(new DefaultStrategy());
        $this->assertInstanceOf(
            'CanalTP\MediaManager\Strategy\StrategyInterface',
            $this->configuration->getStrategy()
        );
    }
}
