<?php

// Data options separated by '|'
// Arguments for options separated by ':'

// Regular data types:
//      string, int, text, bool, date

// Data type options
//      unique, required

//Must start with data type nd then followed by size, then by modifiers if required

// Special data types:
//      parent: requires name of a module, creates a one-to-many relation with the current module
//      related: requires name of a module, creates many to many relation with current module

return [

    'categories' => [],

    'products' => [
        'structure' => [
            'title'             => 'string|max:128',
            'slug'              => 'string|max:128|unique|required',
            'image'             => 'image',
            'category'          => 'parent:categories',
            'short_description' => 'string'
        ]
    ],

    // 'projects'  => [
    //     'structure' => [
    //         'title'         => 'string|max:128',
    //         'description'   => 'string|max:512',
    //         'client'        => 'parent:clients',
    //         'team'          => 'parent:teams',
    //         'gallery'       => 'gallery',
    //     ],
    //     'data'=>[
    //         'Web project X', 'Web project Y', 'App project Z',
    //     ],
    // ],

];
