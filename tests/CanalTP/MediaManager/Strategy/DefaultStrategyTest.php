<?php

namespace CanalTP\MediaManager\Test\Strategy;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Strategy\DefaultStrategy;

class DefaultStrategyTest extends \PHPUnit_Framework_TestCase
{
    private $strategy = null;

    public function setUp()
    {
        $this->strategy = new DefaultStrategy();
    }

    public function testGeneratePath()
    {
        $path = Registry::get('/') . Registry::get('DATA_DIR') . '/logo.jpg';
        $companyName = 'CanalTP';
        $return = $companyName . '/logo.jpg';
        $result = $this->strategy->generatePath($path, $companyName);

        $this->assertInternalType('string', $result);
        $this->assertEquals(
            $result, $return,
            Registry::get('STRATEGY_PATH')
        );
    }
}
