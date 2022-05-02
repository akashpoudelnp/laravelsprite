<?php
return [
    'app_name' => 'Laravel Sprite',
    'dashboard_url' => '/admin',
    'logo_image' => true,
    'logo_url' => '/img/panel.png',
    'sidebar_links' => [
        [
            'name' => 'Home',
            'url' => '/admin',
            'icon' => 'tabler-home',
            'is' => 'admin'
        ],
        [
            'name' => 'Users',
            'url' => '/admin/users',
            'icon' => 'tabler-users',
            'is' => 'admin/users*',
            'child' => [
                [
                    'name' => 'All Users',
                    'url' => '/admin/users',
                    'is' => 'admin/users'
                ],
                [
                    'name' => 'Create New User',
                    'url' => '/admin/users/create',
                    'is' => 'admin/users/create'
                ],
            ],
        ],
        [
            'name' => 'Roles',
            'url' => '/admin/roles',
            'icon' => 'tabler-list',
            'is' => 'admin/roles*',
            'child' => [
                [
                    'name' => 'All Roles',
                    'url' => '/admin/roles',
                    'is' => 'admin/roles'
                ],
                [
                    'name' => 'Create New Role',
                    'url' => '/admin/roles/create',
                    'is' => 'admin/roles/create'
                ],
            ],
        ],
        [
            'name' => 'Permissions',
            'url' => '/admin/permissions',
            'icon' => 'tabler-key',
            'is' => 'admin/permissions*',
            'child' => [
                [
                    'name' => 'All Permissions',
                    'url' => '/admin/permissions',
                    'is' => 'admin/permissions'
                ],
                [
                    'name' => 'Create New Permission',
                    'url' => '/admin/permissions/create',
                    'is' => 'admin/permissions/create'
                ],
            ],
        ]
    ],
];
