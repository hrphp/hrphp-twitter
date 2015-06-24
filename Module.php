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
                'TwitterApiExchangeAdapter' => function ($sm) {
                    $adaptee = $sm->get('TwitterApiExchange');
                    return new TwitterApiExchangeAdapter($adaptee);
                },
                'HrPhpTwitterTimeline' => function ($sm) {
                    $adapter = $sm->get('TwitterApiExchangeAdapter');
                    $service = new Timeline();
                    $service->setAdapter($adapter);
                    return $service;
                }
            )
        );
    }
}
