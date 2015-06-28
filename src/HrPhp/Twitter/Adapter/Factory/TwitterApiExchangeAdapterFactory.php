<?php

namespace HrPhp\Twitter\Adapter\Factory;

use HrPhp\Twitter\Adapter\TwitterApiExchangeAdapter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TwitterApiExchangeAdapterFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $adaptee = $sm->get('TwitterApiExchange');
        return new TwitterApiExchangeAdapter($adaptee);
    }
}
