<?php

namespace CanalTP\MediaManager\Test\Strategy;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Strategy\DefaultStrategy;

class DefaultTest extends \PHPUnit_Framework_TestCase
{
    private $strategy = null;

    public function setUp()
    {
        $this->strategy = new DefaultStrategy();
    }

    public function testgeneratePath()
    {
        $path = __DIR__ . Registry::get('DATA_PATH') . '/logo.jpg';
        $companyName = 'CanalTP';
        $return = Registry::get('TMP_PATH') . $companyName . '/logo.jpg';
        $result = $this->strategy->generatePath($path, $companyName);

        $this->assertInternalType('string', $result);
        $this->assertEquals($result, $return,
            Registry::get('STRATEGY_PATH')
        );
    }
}
