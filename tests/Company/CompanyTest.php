<?php

namespace CanalTP\MediaManager\Test\Company;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Company\Configuration\Builder\ConfigurationBuilder;
use CanalTP\MediaManager\Company\Configuration\Configuration;
use CanalTP\MediaManager\Company\Company;

class CompanyTest extends \PHPUnit_Framework_TestCase
{
    private $company = null;

    public function setUp()
    {
        $params = array(
            'company' => array(
                'storage' => array(
                    'type' => 'filesystem',
                    'path' => '/tmp/MediaManager/',
                ),
                'strategy' => 'default'
            )
        );
        $this->company = new Company();
        $this->configBuilder = new ConfigurationBuilder();

        $this->company->setConfiguration(
            $this->configBuilder->buildConfiguration($params)
        );
    }

    public function testInitialisation()
    {
        $company = new Company();

        $this->assertNull(
            $company->getConfiguration(),
            Registry::get('NOT_INIT')
        );
    }

    public function testGetConfiguration()
    {
        $this->assertInstanceOf(
            Registry::get('CONFIGURATION_INTERFACE'),
            $this->company->getConfiguration(),
            Registry::get('BAD_RETURN')
        );
    }

    public function testSetAndGetName()
    {
        $newName = 'My Company';
        $name = $this->company->getName();

        $this->assertInternalType('string', $name);
        $this->assertEquals(
            $name, 'Unknown',
            Registry::get('NOT_INIT')
        );
        $this->company->setName($newName);
        $this->assertEquals(
            $this->company->getName(),
            $newName,
            Registry::get('NOT_SET')
        );
    }

    public function testGetStorage()
    {
        $this->assertInstanceOf(
            Registry::get('STORAGE_INTERFACE'),
            $this->company->getStorage(),
            Registry::get('NOT_SET')
        );
    }

    public function testGetStrategy()
    {
        $this->assertInstanceOf(
            Registry::get('STRATEGY_INTERFACE'),
            $this->company->getStrategy(),
            Registry::get('NOT_SET')
        );
    }
}
