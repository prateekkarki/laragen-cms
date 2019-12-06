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


    'locations' => [
        'structure' => [
            'title'             => 'string|max:128',
            'slug'              => 'string|max:128|unique|required',
            'image'             => 'image',
            'description' => 'string',
            'sub_locations'     => [
                'title'             => 'string|max:128',
                'slug'              => 'string|max:128|unique|required',
                'image'             => 'image',
                'description'       => 'string',
                'short_code'        => 'string',
                'capacity'          => 'string',
            ]
        ]
    ],

    'vehicle_types' => [
        'structure' => [
            'title'            => 'string|max:128',
        ]
    ],

    'bookings'     => [
        'name'                     => 'string|max:128',
        'type'                     => 'parent:vehicle_types',
        'phone_number'             => 'string|max:128',
        'vehicle_number'           => 'string',
        'start_time'               => 'datetime',
        'end_time'                 => 'datetime',
        'remarks'                  => 'string',
        'is_used'                  => 'boolean',
        'booking_user'          => 'parent:users',
        'sub_location'          => 'parent:location_sub_locations'
    ],

    'parkings' => [
        'structure' => [
            'parking'            => 'string|max:128',
            'type'                  => 'parent:vehicle_types',
            'sub_locations'         => 'parent:location_sub_locations',
            'check_in_at'           => 'datetime',
            'check_in_user'      => 'parent:users',
            'checked_out_at'        => 'datetime',
            'checked_out_user'   => 'parent:users',
            'amount'                => 'integer',
            'booking'            => 'parent:bookings',
            'is_checked_out'        => 'boolean',
            'is_synced'             => 'boolean',
            'is_lost'               => 'boolean',
            'is_night_charge'       => 'boolean',
        ]
    ],
    'employees' => [
        'gender'            => 'options|Male:Female',
        'phone'             => 'string|max:256',
        'mobile'            => 'string|max:256',
        'associated_user'   => 'parent:users',
        'permanent_address' => 'string|max:512',
        'temporary_address' => 'string|max:512',
        'date_of_birth'     => 'date',
        'description'       => 'text',
        'position'          => 'options|Parking Staff:Area Incharge:Office Manager',
        'department'        => 'options|Engineering:Account:Field',
        'date_joined'       => 'date',
        'profile_image'     => 'image',
        'is_active' => 'boolean',
    ],
    'settings' => [
        'structure' => [
            'call_center_number'    => 'string|max:128',
            'lost_rate_two_wheeler' => 'integer',
            'lost_rate_two_wheeler' => 'integer',
            'base_rate_two_wheeler' => 'integer',
            'base_rate_two_wheeler' => 'integer',
            'app_master_password'   => 'string|max:128',
        ]
    ]

];
