<?php
return [
    /* Database access */
    'database' => [
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'webservice',
        'username'  => 'root',
        'password'  => '123123',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ],

    /* Session configuration */
    'session-time' => 10, // hours
    'session-name' => 'application-auth',

    /* Secret key */
    'secret-key' => '@asd9ws.w6*',

    /* Environment */
    'environment' => 'dev', // Options: dev, prod, stop

    /* Timezone */
    'timezone' => 'America/Lima',

    /* Cache */
    'cache' => false
];