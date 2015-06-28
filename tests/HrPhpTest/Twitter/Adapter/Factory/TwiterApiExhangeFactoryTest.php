<?php

namespace HrPhpTest\Twitter\Adapter\Factory;

use HrPhp\Twitter\Adapter\Factory\TwitterApiExchangeFactory;
use Zend\ServiceManager\ServiceManager;

class TwiterApiExhangeFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateService()
    {
        $mockServiceManager = new ServiceManager();
        $mockConfig =
            ['twitter' => [
                'oauth_access_token' => 'token',
                'oauth_access_token_secret' => 'token_secret',
                'consumer_key' => 'key',
                'consumer_secret' => 'secret'
                ]
            ];

        $mockServiceManager->setService('config', $mockConfig);

        $factory = new TwitterApiExchangeFactory();
        $this->assertInstanceOf('\TwitterAPIExchange', $factory->createService($mockServiceManager));
    }

}
