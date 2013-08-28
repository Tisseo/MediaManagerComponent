<?php

namespace CanalTP\MediaManager\Company;

use CanalTP\MediaManager\Company\CompanyInterface;
use CanalTP\MediaManager\Company\Configuration\ConfigurationInterface;

class Company implements CompanyInterface
{
    private $configuration = null;
    private $name = null;

    public function __construct(ConfigurationInterface $config)
    {
        $this->configuration = $config;
        $this->name = 'Unknown';
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
}
