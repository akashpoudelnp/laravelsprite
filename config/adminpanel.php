<?php
return [
    'app_name' => 'AkDash Starter',
    'dashboard_url' => '/admin',
    'logo_image' => true,
    'logo_url' => '/img/logo-dark.png',
    'sidebar_links' => [
        [
            'name' => 'Home',
            'url' => '/admin',
            'icon' => 'tabler-home',
            'is' => 'admin'
        ],
        [
            'header' => 'Authentication',
            'icon' => 'tabler-key',
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
        ],
        [
            'name' => 'Posts',
            'url' => '/admin/posts',
            'icon' => 'tabler-news',
            'is' => 'admin/posts*',
            'child' => [
                [
                    'name' => 'All Posts',
                    'url' => '/admin/posts',
                    'is' => 'admin/posts'
                ],
                [
                    'name' => 'Create New Post',
                    'url' => '/admin/posts/create',
                    'is' => 'admin/posts/create'
                ],
            ],
        ],
        [
            'header' => 'Advanced Section',
            'icon' => 'tabler-adjustments-alt',
        ],
        [
            'name' => 'Console',
            'url' => '/admin/console',
            'icon' => 'tabler-terminal-2',
            'is' => 'admin/console*'
        ],
        [
            'name' => 'Notifications',
            'url' => '/admin/notifications',
            'icon' => 'tabler-bell',
            'is' => 'admin/notifications*',
            'child' => [
                [
                    'name' => 'All Notifications',
                    'url' => '/admin/notifications',
                    'is' => 'admin/notifications'
                ],
                [
                    'name' => 'Create New Notification',
                    'url' => '/admin/notifications/create',
                    'is' => 'admin/notifications/create'
                ],
            ],
        ],
    ],
];
