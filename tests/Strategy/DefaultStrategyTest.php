<?php

namespace CanalTP\MediaManager\Test\Strategy;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Strategy\DefaultStrategy;
use CanalTP\MediaManager\Company\Company;
use CanalTP\MediaManager\Media\Builder\MediaBuilder;
use CanalTP\MediaManager\Category\Line;

class DefaultStrategyTest extends \PHPUnit_Framework_TestCase
{
    private $strategy = null;
    private $media = null;

    public function setUp()
    {
        $mediaBuilder = new MediaBuilder();
        $company = new Company();
        $category = new Line();
        $this->strategy = new DefaultStrategy();

        $company->setName(Registry::get('COMPANY_NAME'));
        $category->setName(Registry::get('CATEGORY_NAME'));
        $this->media = $mediaBuilder->buildMedia(
            'tests/data/CanalTP/sound/jingle_SNCF.mp3',
            $company,
            $category
        );
    }

    public function testGeneratePath()
    {
        $path = Registry::get('COMPANY_NAME') . '/';
        $path .= Registry::get('CATEGORY_NAME') . '/';
        $path .= 'jingle_SNCF.mp3';
        $result = $this->strategy->generatePath($this->media);

        $this->assertInternalType('string', $result);
        $this->assertEquals(
            $result, $path,
            Registry::get('STRATEGY_PATH')
        );
    }
}
