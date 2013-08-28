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
        $this->company = new Company();
    }

    public function testGetConfiguration()
    {
        $params = array(
            'company' => array(
                'storage' => array(
                    'type' => 'filesystem',
                    'path' => '/tmp/MediaManager/',
                ),
                'strategy' => 'default'
            ),
        );
        $configBuilder = new ConfigurationBuilder();
        $configBuilder->buildConfiguration($params);

        $this->assertNull(
            $this->company->getConfiguration(),
            Registry::get('NOT_INIT')
        );
        $this->company->setConfiguration($configBuilder->getConfiguration());
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
}
