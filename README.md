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
4. Please don't forget to set "post_max_size", "upload_max_filesize" and "max_file_uploads" options in your php.ini

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
```php
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
```

#### Run exemple ####

You can use simple_upload.php in example folder (example/simple_upload.php) then
You can run simple_listing.php (example/simple_listing.php) to list all media.



#### Upload Example ####
```Shell
$> cd example
$> ./simple_upload.php
```

```php
// example/simple_upload.php
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

exit (0);
```


#### Listing Example ####

```Shell
$> cd example
$> ./simple_listing.php
```

```php
// example/simple_listing.php
use CanalTP\MediaManager\Company\Company;
use CanalTP\MediaManager\Company\Configuration\Builder\ConfigurationBuilder;
use CanalTP\MediaManager\Category\CategoryType;
use CanalTP\MediaManager\Category\CategoryInterface;
use CanalTP\MediaManager\Category\Factory\CategoryFactory;
$path = '/tmp/MediaManager/my_company/My_LineCategory/jingle_SNCF.mp3';

if (!file_exists($path)) {
    echo "Please run \"./simple_upload.php\" before.\n";
    exit (0);
}

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
$categoryFactory = new CategoryFactory();

$company->setConfiguration($configurationBuilder->buildConfiguration($params));
$company->setName($params['name']);

$category = $categoryFactory->create(CategoryType::LINE);
$category->setName('My_LineCategory');

$medias = $company->getMediasByCategory($category);

foreach ($medias as $media) {
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
}

exit (0);
```


Running MediaManager Tests
---------------------------

To run tests you need to have phpunit.

```Shell
$> phpunit
```

Contributing
-------------

1. Rémy Abi-Khalil - remy.abikhalil@canaltp.fr
