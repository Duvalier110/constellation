<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'administrateur' => [
            'users' => 'c,r,u,d',
            'chambres' => 'c,r,u,d',
            'service' => 'c,r,u,d',
            'categorie' => 'c,r,u,d',
            'reservations' => 'c,r,u,d',
            'roles' => 'c,r,u,d',
            'administrateur' => 'b',
        ],

        'receptioniste' => [
            'reservation' => 'c,r,u,d,b',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'b' => 'bord',
    ],
];
