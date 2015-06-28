<?php

return [
    'service_manager' => [
        'invokables' => [],
        'factories' => [
            'TwitterApiExchange'        => 'HrPhp\Twitter\Adapter\Factory\TwitterApiExchangeFactory',
            'TwitterApiExchangeAdapter' => 'HrPhp\Twitter\Adapter\Factory\TwitterApiExchangeAdapterFactory',
            'HrPhpTwitterTimeline'      => 'HrPhp\Twitter\Factory\TimelineFactory'
        ]
    ]
];
