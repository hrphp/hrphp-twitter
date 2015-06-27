<?php

namespace HrPhp\Twitter\Factory;

use HrPhp\Twitter\Timeline;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TimelineFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $adapter = $sm->get('TwitterApiExchangeAdapter');
        $service = new Timeline();
        $service->setAdapter($adapter);
        return $service;
    }
}
