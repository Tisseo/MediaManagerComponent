<?php

namespace CanalTP\MediaManager\Test\Storage;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Company\Configuration\Builder\ConfigurationBuilder;
use CanalTP\MediaManager\Company\Configuration\Configuration;
use CanalTP\MediaManager\Media\Factory\MediaFactory;
use CanalTP\MediaManager\Company\Company;
use CanalTP\MediaManager\Category\LineCategory;
use CanalTP\MediaManager\Media\Builder\MediaBuilder;

class FileSystemTest extends \PHPUnit_Framework_TestCase
{
    private $media = null;
    private $company = null;
    private $filePath = null;

    public function setUp()
    {
        $mediaBuilder = new MediaBuilder();
        $params = array(
            'name' => 'my_company',
            'storage' => array(
                'type' => 'filesystem',
                'path' => '/tmp/MediaManager/',
            ),
            'strategy' => 'default'
        );
        $category = new LineCategory();
        $category->setName(Registry::get('CATEGORY_NAME'));
        $this->company = new Company();
        $this->company->setName('my_company');
        $this->configBuilder = new ConfigurationBuilder();

        $this->company->setConfiguration(
            $this->configBuilder->buildConfiguration($params)
        );
        $this->filePath = Registry::get('/') . Registry::get('SOUND_FILE');
        $this->media = $mediaBuilder->buildMedia(
            $this->filePath,
            $this->company,
            $category
        );

        $this->assertTrue(
            file_exists($this->filePath),
            Registry::get('FILE_EXIST')
        );
    }

    public function testAddMedia()
    {
        $this->assertTrue(
            $this->company->addMedia($this->media),
            Registry::get('STORAGE_MOVE')
        );
        $this->assertFalse(
            file_exists($this->filePath),
            Registry::get('STORAGE_MOVE')
        );
    }

    public function tearDown()
    {
        $path = $this->company->getStorage()->getPath();

        rename($this->media->getPath(), $this->filePath);
        rmdir(dirname($this->media->getPath()));
        rmdir($path . Registry::get('COMPANY_NAME'));
        rmdir($path);
    }
}
