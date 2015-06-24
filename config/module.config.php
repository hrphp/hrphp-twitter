<?php

return [
    'service_manager' => [
        'invokables' => [],
        'factories' => [
            'TwitterApiExchange' => 'HrPhp\Twitter\Adapter\Factory\TwitterApiExchangeFactory'
        ]
    ]
];
