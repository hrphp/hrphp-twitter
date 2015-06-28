<?php

namespace HrPhpTest\Twitter\Factory;

use HrPhp\Twitter\Factory\TimelineFactory;
use Zend\ServiceManager\ServiceManager;

class TimelineFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateService()
    {
        $mockServiceManager = new ServiceManager();
        $mockTwitterApiExchangeAdapter = $this->getMockBuilder('\HrPhp\Twitter\Adapter\TwitterApiExchangeAdapter')->disableOriginalConstructor()->getMock();
        $mockServiceManager->setService('TwitterApiExchangeAdapter', $mockTwitterApiExchangeAdapter);

        $factory = new TimelineFactory();
        $this->assertInstanceOf('HrPhp\Twitter\Timeline', $factory->createService($mockServiceManager));
    }

}
