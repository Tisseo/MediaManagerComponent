<?php

namespace CanalTP\MediaManager\Company;

use CanalTP\MediaManager\Media\MediaInterface;
use CanalTP\MediaManager\Company\Configuration\ConfigurationInterface;

interface CompanyInterface
{
    public function __construct();
    public function setConfiguration(ConfigurationInterface $config);
    public function getConfiguration();
    public function getStorage();
    public function getStrategy();
    public function addMedia(MediaInterface $media);
}
