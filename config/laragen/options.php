<?php
return [
    'items_to_generate' => [
        'Common' => [
            'Migration',
            'Model',
            'Seeder',
            'Route',
            'Resource',
            'JsonResourceCollection',
            'ApiController',
        ],
        'Backend' => [
            'Controller',
            'Api',
            'Request',
            'View',
            // 'Observer'
        ]
    ],
    'image_sizes' => [
        'sm' => '500x500',
        'md' => '800x800',
        'xs' => '200x200',
    ],
    'events'    => [
        'created', 'updated', 'deleted'
    ],
    'seed_rows' => 25,
    'listing_per_page' => 20,
    'generic_fields' => false,
    'seo_fields' => false,
    'user_model' => 'App\User'
];
