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
            'company' => array(
                'storage' => array(
                    'type' => 'filesystem',
                    array('path' => '/tmp/MediaManager/'),
                ),
                'strategy' => 'default'
            ),
        );

        $this->builder = new ConfigurationBuilder();
    }

    public function testBuildConfiguration()
    {
        $configuration = $this->builder->buildConfiguration($this->params);
    }

    public function testGetConfiguration()
    {
        $this->assertNull(
            $this->builder->getConfiguration(),
            Registry::get('NOT_INIT')
        );
        $this->builder->buildConfiguration($this->params);
        $this->assertInstanceOf(
            Registry::get('CONFIGURATION_INTERFACE'),
            $this->builder->getConfiguration(),
            Registry::get('BAD_RETURN')
        );
    }
}
