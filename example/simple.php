#!/usr/bin/php
<?php

require __DIR__.'/../vendor/autoload.php';

use CanalTP\MediaManager\Company\Company;
use CanalTP\MediaManager\Company\Configuration\Builder\ConfigurationBuilder;
use CanalTP\MediaManager\Media\Builder\MediaBuilder;
use CanalTP\MediaManager\Category\CategoryType;
use CanalTP\MediaManager\Category\Factory\CategoryFactory;

$params = array(
    'name' => 'my_company',
    'storage' => array(
        'type' => 'filesystem',
        'path' => '/tmp/MediaManager/',
    ),
    'strategy' => 'default'
);
$company = new Company();
$configurationBuilder = new ConfigurationBuilder();
$mediaBuilder = new MediaBuilder();
$categoryFactory = new CategoryFactory();

$company->setConfiguration($configurationBuilder->buildConfiguration($params));
$company->setName($params['name']);

$category = $categoryFactory->create(CategoryType::LINE);
$category->setName('My_LineCategory');

$media = $mediaBuilder->buildMedia(
    '../tests/data/CanalTP/sound/jingle_SNCF.mp3',
    $company,
    $category
);

$company->addMedia($media);

echo "\n######### " . $media->getFileName() . " ############\n\n";
echo "Path: " . $media->getPath() . "\n";
echo "BaseName: " . $media->getBaseName() . "\n";
echo "FileName: " . $media->getFileName() . "\n";
echo "Size: " . $media->getSize() . "\n";
echo "Type: " . $media->getType() . "\n";
echo "Extension: " . $media->getExtension() . "\n";
echo "MediaType: " . $media->getMediaType() . "\n";
echo "Company: " . $media->getCompany()->getName() . "\n";
echo "Category: " . $media->getCategory()->getName() . "\n";
echo "\n############################################\n\n";
