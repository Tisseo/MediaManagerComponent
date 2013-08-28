<?php

namespace CanalTP\MediaManager\Test\Storage;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Company\Company;
use CanalTP\MediaManager\Company\Configuration\Configuration;
use CanalTP\MediaManager\Strategy\DefaultStrategy;
use CanalTP\MediaManager\Media\Factory\MediaFactory;
use CanalTP\MediaManager\Storage\FileSystem;

class FileSystemTest extends \PHPUnit_Framework_TestCase
{
    private $storage = null;
    private $strategy = null;
    private $media = null;
    private $filePath = null;

    public function setUp()
    {
        $factory = new MediaFactory();
        $company = new Company(new Configuration());
        $company->setName('My Company');
        $this->strategy = new DefaultStrategy();
        $this->storage = new FileSystem();
        $this->filePath = Registry::get('/') . Registry::get('SOUND_TEST');
        $this->media = $factory->create($this->filePath);
        $this->media->setPath($this->filePath);
        $this->media->setCompany($company);
        $this->storage->setPath(Registry::get('TMP_DIR'));

        $this->assertTrue(
            file_exists($this->filePath),
            Registry::get('FILE_EXIST')
        );
    }

    public function testAddMedia()
    {
        $this->assertTrue(
            $this->storage->addMedia($this->media, $this->strategy),
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
    }
}
