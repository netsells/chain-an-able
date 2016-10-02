<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Database keys
    |--------------------------------------------------------------------------
    |
    | This is where you can specify the keys that are used to store
    | the content of the CMS.
    |
    */

    'database' => [
        'key_field' => 'key',
        'value_field' => 'value',
    ],

    'models' => [
        'page' => [
            'model' => \App\Karoway\Page::class,
            'relation' => 'properties',
        ]

    ]
];
