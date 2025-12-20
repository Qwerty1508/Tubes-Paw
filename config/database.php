<?php

use Illuminate\Support\Str;

return [

    'default' => env('DB_CONNECTION', 'sqlite'),
    
    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DB_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),