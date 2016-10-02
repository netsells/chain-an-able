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

    /*
   |--------------------------------------------------------------------------
   | Eloquent model
   |--------------------------------------------------------------------------
   |
   | Here you need to specify the model you want your app to use for pages
   | this is also where you declare what relationship returns a pages
   | attributes.
   |
   */

    'models' => [
        'page' => [
            'model' => Page::class,
            'relation' => 'properties',
        ]

    ]
];
