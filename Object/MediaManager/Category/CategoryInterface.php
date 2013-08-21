<?php

namespace CanalTP\MediaManager\Category;

interface CategoryInterface
{
    public function getMediaArray();
    public function addMedia(IMedia $media);
    public function getMediaNumber();

    public function getName();
    public function setName($name);
}