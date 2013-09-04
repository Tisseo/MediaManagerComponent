<?php

namespace CanalTP\MediaManager\Test\Storage;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Company\Configuration\Builder\ConfigurationBuilder;
use CanalTP\MediaManager\Company\Configuration\Configuration;
use CanalTP\MediaManager\Media\Factory\MediaFactory;
use CanalTP\MediaManager\Company\Company;

class FileSystemTest extends \PHPUnit_Framework_TestCase
{
    private $storage = null;
    private $strategy = null;
    private $media = null;
    private $company = null;
    private $filePath = null;

    public function setUp()
    {
        $factory = new MediaFactory();
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
        $this->company->setName('my_company');
        $this->configBuilder = new ConfigurationBuilder();

        $this->company->setConfiguration(
            $this->configBuilder->buildConfiguration($params)
        );
        $this->filePath = Registry::get('/') . Registry::get('SOUND_TEST');
        $this->media = $factory->create($this->filePath);
        $this->media->setPath($this->filePath);
        $this->media->setCompany($this->company);

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
        rename($this->media->getPath(), $this->filePath);
        rmdir(dirname($this->media->getPath()));
        rmdir($this->company->getStorage()->getPath());
    }
}
