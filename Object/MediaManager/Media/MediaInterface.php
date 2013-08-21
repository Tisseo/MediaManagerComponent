<?php

namespace CanalTP\MediaManager\Media;

interface MediaInterface
{
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
}
