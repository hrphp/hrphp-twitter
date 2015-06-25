<?php

namespace HrPhpTest\Twitter\Adapter\Factory;

use HrPhp\Twitter\Adapter\Factory\TwitterApiExchangeAdapterFactory;
use Zend\ServiceManager\ServiceManager;

class TwiterApiExhangeAdapterFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateService()
    {
        $mockServiceManager = new ServiceManager();
        $mockTwitterApiExchange = $this->getMockBuilder('\TwitterApiExchange')->disableOriginalConstructor()->getMock();
        $mockServiceManager->setService('TwitterApiExchange', $mockTwitterApiExchange);

        $factory = new TwitterApiExchangeAdapterFactory();
        $this->assertInstanceOf('HrPhp\Twitter\Adapter\TwitterApiExchangeAdapter', $factory->createService($mockServiceManager));
    }

}
