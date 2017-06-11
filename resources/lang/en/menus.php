<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Menus Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in menu items throughout the system.
    | Regardless where it is placed, a menu item can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'title' => 'Access Management',

            'roles' => [
                'all'        => 'All Roles',
                'create'     => 'Create Role',
                'edit'       => 'Edit Role',
                'management' => 'Role Management',
                'main'       => 'Roles',
            ],

            'users' => [
                'all'             => 'All Users',
                'change-password' => 'Change Password',
                'create'          => 'Create User',
                'deactivated'     => 'Deactivated Users',
                'deleted'         => 'Deleted Users',
                'edit'            => 'Edit User',
                'main'            => 'Users',
                'view'            => 'View User',
            ],
            'page' => [
                'all'        => 'All Pages',
                'create'     => 'Create Page',
                'edit'       => 'Edit Page',
                'management' => 'Pages Management',
                'main'       => 'Pages',
            ],
            'block' => [
                'all'        => 'All Blocks',
                'create'     => 'Create Block',
                'edit'       => 'Edit Block',
                'management' => 'Blocks Management',
                'main'       => 'Blocks',
            ],
            'news' => [
                'all'        => 'All News',
                'create'     => 'Create News',
                'edit'       => 'Edit News',
                'management' => 'News Management',
                'main'       => 'News',
            ],
            'category' => [
                'all'        => 'All Categories',
                'create'     => 'Create Category',
                'create_root'     => 'Create root Category',
                'edit'       => 'Edit Category',
                'management' => 'Categories Management',
                'main'       => 'Categories',
            ],
            'collection' => [
                'all'        => 'All Collections',
                'create'     => 'Create Collection',
                'edit'       => 'Edit Collection',
                'management' => 'Collections Management',
                'main'       => 'Collections',
            ],
            'faq' => [
                'all'        => 'All Questions',
                'create'     => 'Create Question',
                'edit'       => 'Edit Question',
                'management' => 'FAQs Management',
                'main'       => 'Questions',
            ],
        ],

        'log-viewer' => [
            'main'      => 'Log Viewer',
            'dashboard' => 'Dashboard',
            'logs'      => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Dashboard',
            'general'   => 'General',
            'system'    => 'System',
        ],
    ],

    'language-picker' => [
        'language' => 'Language',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar'    => 'Arabic',
            'zh'    => 'Chinese Simplified',
            'zh-TW' => 'Chinese Traditional',
            'da'    => 'Danish',
            'de'    => 'German',
            'el'    => 'Greek',
            'en'    => 'English',
            'es'    => 'Spanish',
            'fr'    => 'French',
            'id'    => 'Indonesian',
            'it'    => 'Italian',
            'ja'    => 'Japanese',
            'nl'    => 'Dutch',
            'pt_BR' => 'Brazilian Portuguese',
            'ru'    => 'Russian',
            'sv'    => 'Swedish',
            'th'    => 'Thai',
            'tr'    => 'Turkish',
        ],
    ],
];
