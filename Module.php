<?php

namespace HrPhp\Twitter;

use HrPhp\Twitter\Adapter\TwitterApiExchangeAdapter;
use Zend\Mvc\MvcEvent;
use \TwitterAPIExchange;

class Module
{

    public function getConfig()
    {
        return include __DIR__.'/config/module.config.php';
    }

    public function onBootstrap(MvcEvent $mvcEvent)
    {
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'HrPhp\Twitter\Client' => function ($sm) {
                    $settings = array(
                        'oauth_access_token' => $sm->get('config')['twitter']['oauth_access_token'],
                        'oauth_access_token_secret' => $sm->get('config')['twitter']['oauth_access_token_secret'],
                        'consumer_key' => $sm->get('config')['twitter']['consumer_key'],
                        'consumer_secret' => $sm->get('config')['twitter']['consumer_secret']
                    );
                    $client = new TwitterAPIExchange($settings);
                    $adapter = new TwitterApiExchangeAdapter($client);
                    $service = new Service();
                    $service->setAdapter($adapter);
                    return new $service;
                }
            )
        );
    }
}
