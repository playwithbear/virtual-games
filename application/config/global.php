<?php

if ($_SERVER['REMOTE_ADDR'] == '::1' || $_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
    $config = [
        'VirtualGamesDB' => [
            'hostname' => 'localhost',
            'db' => 'virtual-games',
        ],
    ];
} else {
    $config = [
        'VirtualGamesDB' => [
            'hostname' => 'db5000749361.hosting-data.io',
            'db' => 'dbs681428',
        ],
    ];
}

return $config;