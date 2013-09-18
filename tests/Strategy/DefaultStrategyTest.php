<?php

namespace CanalTP\MediaManager\Test\Strategy;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Company\Configuration\Builder\ConfigurationBuilder;
use CanalTP\MediaManager\Company\Configuration\Configuration;
use CanalTP\MediaManager\Media\Builder\MediaBuilder;
use CanalTP\MediaManager\Category\Factory\CategoryFactory;
use CanalTP\MediaManager\Category\CategoryType;
use CanalTP\MediaManager\Company\Company;

class DefaultStrategyTest extends \PHPUnit_Framework_TestCase
{
    private $company = null;
    private $strategy = null;
    private $category = null;
    private $media = null;

    public function setUp()
    {
        $params = array(
            'name' => Registry::get('COMPANY_NAME'),
            'storage' => array(
                'type' => 'filesystem',
                'path' => '/tmp/MediaManager/',
            ),
            'strategy' => Registry::get('STRATEGY_NAME')
        );

        $this->company = new Company();
        $configurationBuilder = new ConfigurationBuilder();
        $mediaBuilder = new MediaBuilder();
        $categoryFactory = new CategoryFactory();

        $this->company->setConfiguration(
            $configurationBuilder->buildConfiguration($params)
        );

        $this->category = $categoryFactory->create(CategoryType::LINE);
        $this->category->setName(Registry::get('CATEGORY_NAME'));

        $this->media = $mediaBuilder->buildMedia(
            Registry::get('/') . Registry::get('SOUND_FILE'),
            $this->company,
            $this->category
        );

        $this->company->setName(Registry::get('COMPANY_NAME'));
        $this->company->addMedia($this->media);
    }

    public function testGeneratePath()
    {
        $path = Registry::get('COMPANY_NAME') . '/';
        $path .= Registry::get('CATEGORY_NAME') . '/';
        $path .= 'jingle_SNCF.mp3';
        $result = $this->company->getStrategy()->generatePath($this->media);

        $this->assertInternalType('string', $result);
        $this->assertEquals(
            $result, $path,
            Registry::get('STRATEGY_PATH')
        );
    }


    public function testGetMediasByCategory()
    {
        $medias = $this->company->getMediasByCategory(
            $this->category
        );

        foreach ($medias as $media) {
            $this->assertInstanceOf(
                Registry::get('MEDIA_INTERFACE'),
                $media,
                Registry::get('NOT_SET')
            );
        }
        $this->assertEquals(1, $this->category->getMediaNumber());
    }

    public function tearDown()
    {
        $data_path = Registry::get('/') . Registry::get('SOUND_FILE');
        $path = $this->company->getStorage()->getPath();

        rename($this->media->getPath(), $data_path);
        rmdir(dirname($this->media->getPath()));
        rmdir($path . Registry::get('COMPANY_NAME'));
        rmdir($path);
    }
}
