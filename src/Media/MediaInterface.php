<?php

namespace CanalTP\MediaManager\Media;

use CanalTP\MediaManager\Category\CategoryInterface;
use CanalTP\MediaManager\Company\CompanyInterface;

interface MediaInterface
{
    public function getFileName();
    public function setFileName($fileName);

    public function getBaseName();
    public function setBaseName($baseName);

    public function getMediaType();
    public function setMediaType($type);

    public function getType();
    public function setType($type);

    public function getSize();
    public function setSize($size);

    public function getExpirationDate();
    public function setExpirationDate($date);

    public function getPath();
    public function setPath($path);

    public function getCategory();
    public function setCategory(CategoryInterface $path);

    public function getCompany();
    public function setCompany(CompanyInterface $company);

    public function delete($force);
}
