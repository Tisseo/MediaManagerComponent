<?php

namespace CanalTP\MediaManager\Category;

use CanalTP\MediaManager\Media\MediaInterface;
use CanalTP\MediaManager\Company\CompanyInterface;

interface CategoryInterface
{
    public function getMedias();
    public function addMedia(MediaInterface $media);
    public function getMediaNumber();

    public function getName();
    public function setName($name);

    public function getId();
    public function setId($id);

    public function getRessourceId();

    public function getParent();
    public function setParent(CategoryInterface $category);

    public function delete(CompanyInterface $company, $force);
}
