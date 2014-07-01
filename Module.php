<?php

namespace HrPhp\Twitter;

use HrPhp\Twitter\TwitterClientAdapter;
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
            'invokables' => array(
                    'HrPhp\Twitter\TwitterFeedWrapper' => 'HrPhp\Twitter\TwitterFeedWrapper',
            ),
            'factories' => array(
                'HrPhp\Twitter\TwitterClient' => function ($sm) {
                    $clientAdapter = new TwitterClientAdapter();
                    $settings = array(
                           'oauth_access_token' => $sm->get('config')['twitter']['oauth_access_token'],
                           'oauth_access_token_secret' => $sm->get('config')['twitter']['oauth_access_token_secret'],
                           'consumer_key' => $sm->get('config')['twitter']['consumer_key'],
                           'consumer_secret' => $sm->get('config')['twitter']['consumer_secret']
                    );
                    $twitterClient = new TwitterAPIExchange($settings);
                    $clientAdapter->setTwitterClient($twitterClient);
                    $clientAdapter->setScreenName($sm->get('screen_name'));
                    return $clientAdapter;
                }
        ));
    }
}
