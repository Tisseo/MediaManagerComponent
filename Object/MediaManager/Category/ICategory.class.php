<?php

interface iCategory
{
	public function getMediaArray();
	public function addMedia(IMedia $media);
	public function getMediaNumber();

	public function getName();
	public function setName($name);
}