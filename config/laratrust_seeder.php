<?php

return [
    'roles_structure' => [
        'super_admin' => [
            'users' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'products' => 'c,r,u,d',
            'orders' => 'c,r,u,d',
            'clients' => 'c,r,u,d',
        ],
        'admins' => [],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
