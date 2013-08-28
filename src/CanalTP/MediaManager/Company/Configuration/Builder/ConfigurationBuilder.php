<?php

namespace CanalTP\MediaManager\Company\Configuration\Builder;

use CanalTP\MediaManager\Company\Configuration\Builder\ConfigurationBuilderInterface;
use CanalTP\MediaManager\Company\Configuration\Configuration;
use CanalTP\MediaManager\Strategy\DefaultStrategy;
use CanalTP\MediaManager\Storage\FileSystem;

class ConfigurationBuilder implements ConfigurationBuilderInterface
{
    private $configuration = null;

    private function initFileSystemStorage($params)
    {
        $filesystem = new FileSystem();

        $filesystem->setPath($params['company']['storage']['path']);
        $this->configuration->setStorage($filesystem);
    }

    private function initStorage($params)
    {
        switch ($params['company']['storage']['type']) {
            case 'filesystem':
                $this->initFileSystemStorage($params);
                break;
        }
    }

    private function initStrategy($params)
    {
        switch ($params['company']['strategy']) {
            case 'default':
                $this->configuration->setStrategy(new DefaultStrategy());
                break;
        }
    }

    public function buildConfiguration($params)
    {
        $this->configuration = new Configuration();

        $this->initStorage($params);
        $this->initStrategy($params);
    }

    public function getConfiguration()
    {
        return ($this->configuration);
    }
}
