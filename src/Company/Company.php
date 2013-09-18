<?php

namespace CanalTP\MediaManager\Company;

use CanalTP\MediaManager\Company\CompanyInterface;
use CanalTP\MediaManager\Category\CategoryInterface;
use CanalTP\MediaManager\Media\MediaInterface;
use CanalTP\MediaManager\Company\Configuration\ConfigurationInterface;


class Company implements CompanyInterface
{
    private $configuration = null;
    private $name = null;

    public function __construct()
    {
        $this->name = 'Unknown';
    }

    public function getStorage()
    {
        return ($this->configuration->getStorage());
    }

    public function getStrategy()
    {
        return ($this->configuration->getStrategy());
    }

    public function setConfiguration(ConfigurationInterface $config)
    {
        $this->configuration = $config;
    }

    public function getConfiguration()
    {
        return ($this->configuration);
    }

    public function getName()
    {
        return ($this->name);
    }

    public function setName($newName)
    {
        $this->name = $newName;
    }

    public function addMedia(MediaInterface $media)
    {
        return ($this->getStorage()->addMedia($media, $this->getStrategy()));
    }

    public function getMediasByCategory(CategoryInterface $category)
    {
        return ($this->getStorage()->getMediasByCategory(
                $this,
                $this->getStrategy(),
                $category
            )
        );
    }
}
