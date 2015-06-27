<?php

namespace HrPhp\Twitter\Adapter\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TwitterApiExchangeFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $settings = array(
            'oauth_access_token' => $sm->get('config')['twitter']['oauth_access_token'],
            'oauth_access_token_secret' => $sm->get('config')['twitter']['oauth_access_token_secret'],
            'consumer_key' => $sm->get('config')['twitter']['consumer_key'],
            'consumer_secret' => $sm->get('config')['twitter']['consumer_secret']
        );
        return new \TwitterAPIExchange($settings);
    }
}
