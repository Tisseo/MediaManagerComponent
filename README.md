README
======

What is MediaManager ?
-----------------------

MediaManager is a PHP component to manage all media in a project.
(For example: [MediaManagerBundle](http://hg.prod.canaltp.fr/ctp/MediaManagerBundle.git/summary))


Requirements
-------------

__nothing__

Installation
-------------

You need composer to install the MediaManager.

1. Open your composer.json in your project
2. Add require "canaltp/media-manager": "dev-master"
3. Add url of the repository, 'http://packagist.canaltp.fr'

    // composer.json
    {
        ...
        "require": {
            ...
            "canaltp/media-manager": "dev-master"
        },
        "repositories": [
            {
                "type": "composer",
                "url": "http://packagist.canaltp.fr"
            },
            ...
        ],
        ...
    }

How to use MediaManager ?
--------------------------

MediaManager need to have "Company" with "Strategy".
The strategy is use to define all informations about the manipulations
 you would like to do with medias.

 For exemple if you want to use local stockage to put medias, you have to do
  this informations.

    // Strategy
    $params = array(
        'company' => array(
        'storage' => array(
            'type' => 'filesystem',
            'path' => '/tmp/my_storage/',
        ),
        'strategy' => 'default'
        )
    );

#### Run exemple ####

You can use simple.php in example folder (example/simple.php)

    // Shell
    $> cd example
    $> ./simple.php


#### Exemple ####

    // example/simple.php
    use CanalTP\MediaManager\Company\Company;
    use CanalTP\MediaManager\Company\Configuration\Builder\ConfigurationBuilder;
    use CanalTP\MediaManager\Media\Builder\MediaBuilder;
    use CanalTP\MediaManager\Category\CategoryType;
    use CanalTP\MediaManager\Category\Factory\CategoryFactory;

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
    $categoryFactory = new CategoryFactory();

    $company->setConfiguration($configurationBuilder->buildConfiguration($params));
    $company->setName('My_Company');

    $category = $categoryFactory->create(CategoryType::LINE);
    $category->setName('My_LineCategory');

    $media = $mediaBuilder->buildMedia(
        '../tests/data/CanalTP/sound/jingle_SNCF.mp3',
        $company,
        $category
    );

    $company->addMedia($media);

Running MediaManager Tests
---------------------------

To run tests you need to have phpunit.

    // Shell
    $> phpunit

Contributing
-------------

1. Rémy Abi-Khalil - remy.abikhalil@canaltp.fr
