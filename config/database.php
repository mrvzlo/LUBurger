<?php

$url = parse_url(getenv("postgres://fdefyoktzhaqct:f6db053bf809390f8b766c73d90906ea16ed9a83f0aa7a108697e9780f02a794@ec2-79-125-12-48.eu-west-1.compute.amazonaws.com:5432/d99rgc00qge29"));

return [


    'default' => env('DB_CONNECTION', 'pgsql_production'),

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
        ],
		
        'pgsql_production' => [
            'driver' => 'pgsql',
            'host' => $url["host"],
            'port' => $url["port"],
            'database' => substr($url["path"], 1),
            'username' => $url["user"],
            'password' => $url["pass"],
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => 'predis',

        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],

];
