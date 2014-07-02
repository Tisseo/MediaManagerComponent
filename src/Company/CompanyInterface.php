<?php

namespace CanalTP\MediaManager\Company;

use CanalTP\MediaManager\Media\MediaInterface;
use CanalTP\MediaManager\Category\CategoryInterface;
use CanalTP\MediaManager\Company\Configuration\ConfigurationInterface;

interface CompanyInterface
{
    public function __construct();
    public function setConfiguration(ConfigurationInterface $config);
    public function getConfiguration();
    public function getStorage();
    public function getStrategy();
    public function getId();
    public function setId($id);
    public function getName();
    public function setName($name);
    public function addMedia(MediaInterface $media);
    public function getMediasByCategory(CategoryInterface $category);
    public function findMedia(CategoryInterface $category, $mediaId);
    public function removeMedia(CategoryInterface $category, $basename, $force);
}
