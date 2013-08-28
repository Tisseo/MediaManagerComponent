<?php

namespace CanalTP\MediaManager\Company;

use CanalTP\MediaManager\Company\Configuration\ConfigurationInterface;

interface CompanyInterface
{
    public function __construct(ConfigurationInterface $config);
    public function getConfiguration();
}