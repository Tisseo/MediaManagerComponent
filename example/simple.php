#!/usr/bin/php
<?php

require __DIR__.'/../vendor/autoload.php';

use CanalTP\MediaManager\Company\Company;
use CanalTP\MediaManager\Company\Configuration\Builder\ConfigurationBuilder;
use CanalTP\MediaManager\Media\Builder\MediaBuilder;
use CanalTP\MediaManager\Category\Line;

$params = array(
    'company' => array(
    'storage' => array(
        'type' => 'filesystem',
        'path' => __DIR__ . '/my_storage/',
    ),
    'strategy' => 'default'
    )
);

$company = new Company();
$configurationBuilder = new ConfigurationBuilder();
$mediaBuilder = new MediaBuilder();
$category = new Line();

$company->setName('My_Company');
$category->setName('My_Category');

$company->setConfiguration($configurationBuilder->buildConfiguration($params));

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
