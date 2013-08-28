<?php

namespace CanalTP\MediaManager\Company\Configuration\Builder;

interface ConfigurationBuilderInterface
{
    public function buildConfiguration($files);
    public function getConfiguration();
}
