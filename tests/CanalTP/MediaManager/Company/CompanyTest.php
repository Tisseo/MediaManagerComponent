<?php

namespace CanalTP\MediaManager\Test\Company;

use CanalTP\MediaManager\Registry;
use CanalTP\MediaManager\Company\Configuration\Configuration;
use CanalTP\MediaManager\Company\Company;

class CompanyTest extends \PHPUnit_Framework_TestCase
{
    private $company = null;

    public function setUp()
    {
        $this->company = new Company(new Configuration());
    }

    public function testGetConfiguration()
    {
        $this->assertInstanceOf(
            Registry::get('CONFIGURATION_INTERFACE'),
            $this->company->getConfiguration(),
            Registry::get('BAD_RETURN')
        );
    }

    public function tearDown()
    {
    }
}
