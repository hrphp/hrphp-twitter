<?php
 
namespace HrPhpTest\Twitter;

use HrPhp\Twitter\Service;

class ServiceTest extends \PHPUnit_Framework_TestCase
{
    /**@var \HrPhp\Twitter\Service */
    private $service;

    public function testGetSetAdapter()
    {
        $className = '\HrPhp\Twitter\Adapter\AdapterInterface';
        $adapter = $this->getMockForAbstractClass($className);
        $this->service->setAdapter($adapter);
        $this->assertInstanceOf($className, $this->service->getAdapter());
    }

    protected function setUp()
    {
        $this->service = new Service();
    }
}
