<?php

namespace CanalTP\MediaManager\Test\Company\Configuration\Builder;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Company\Configuration\Builder\ConfigurationBuilder;

class ConfigurationBuilderTest extends \PHPUnit_Framework_TestCase
{
    private $builder = null;
    private $params = null;

    public function setUp()
    {
        $this->params = array(
            'name' => 'my_company',
            'storage' => array(
                'type' => 'filesystem',
                'path' => '/tmp/MediaManager/',
            ),
            'strategy' => 'default'
        );
        $this->builder = new ConfigurationBuilder();
    }

    public function testBuildConfiguration()
    {
        $configuration = $this->builder->buildConfiguration($this->params);
    }

    public function testGetConfiguration()
    {
        $configuration = $this->builder->buildConfiguration($this->params);
        $this->assertInstanceOf(
            Registry::get('CONFIGURATION_INTERFACE'),
            $configuration,
            Registry::get('BAD_RETURN')
        );
    }
}
