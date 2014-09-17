<?php

namespace CanalTP\MediaManager\Test;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Company\Configuration\Builder\ConfigurationBuilder;
use CanalTP\MediaManager\Media\Builder\MediaBuilder;
use CanalTP\MediaManager\Category\Factory\CategoryFactory;
use CanalTP\MediaManager\Category\CategoryType;
use CanalTP\MediaManager\Company\Company;

abstract class AbstractTest extends \PHPUnit_Framework_TestCase
{
    protected $company = null;

    private function deleteDirRecursively($path)
    {
        foreach (glob($path . '/*') as $subPath) {
            $this->deleteDirRecursively($subPath);
        }
        rmdir($path);
    }

    public function tearDown()
    {
        $path = $this->company->getStorage()->getPath();

        $this->deleteDirRecursively($path);
        parent::tearDown();
    }
}
