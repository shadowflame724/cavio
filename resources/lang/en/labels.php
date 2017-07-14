    <?php

return [

    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'general' => [
        'all' => 'All',
        'yes' => 'Yes',
        'no' => 'No',
        'custom' => 'Custom',
        'actions' => 'Actions',
        'active' => 'Active',
        'buttons' => [
            'save' => 'Save',
            'update' => 'Update',
        ],
        'hide' => 'Hide',
        'inactive' => 'Inactive',
        'none' => 'None',
        'show' => 'Show',
        'toggle_navigation' => 'Toggle Navigation',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create' => 'Create Role',
                'edit' => 'Edit Role',
                'management' => 'Role Management',

                'table' => [
                    'number_of_users' => 'Number of Users',
                    'permissions' => 'Permissions',
                    'role' => 'Role',
                    'sort' => 'Sort',
                    'total' => 'role total|roles total',
                ],
            ],
            'page' => [
                'create' => 'Create Page',
                'edit' => 'Edit Page',
                'management' => 'Pages Management',

                'table' => [
                    'id' => 'Id',
                    'pageKey' => 'Page Key',
                    'title' => 'Title',
                    'created_at' => 'Created at'
                ],
            ],
            'block' => [
                'create' => 'Create Block',
                'edit' => 'Edit Block',
                'management' => 'Blocks Management',

                'table' => [
                    'id' => 'Id',
                    'title' => 'Title',
                    'image' => 'Image Name',
                    'created_at' => 'Created at'
                ],
            ],
            'news' => [
                'create' => 'Create News',
                'edit' => 'Edit News',
                'management' => 'News Management',

                'table' => [
                    'id' => 'Id',
                    'title' => 'Title',
                    'type' => 'Type',
                    'image' => 'Image Name',
                    'created_at' => 'Created at'
                ],
            ],
            'category' => [
                'create' => 'Create Category',
                'edit' => 'Edit Category',
                'delete' => 'Delete Category',
                'management' => 'Categories Management',
            ],
            'collection' => [
                'create' => 'Create Collection',
                'edit' => 'Edit Collection',
                'management' => 'Collections Management',

                'table' => [
                    'id' => 'Id',
                    'title' => 'Title',
                    'image' => 'Image Name',
                    'banner' => 'Banner',
                    'created_at' => 'Created at'
                ],
                'zones' => [
                    'management' => 'Collection-Zones Management'
                ]
            ],
            'marker' => [
                'create' => 'Create Marker',
                'edit' => 'Edit Marker',
                'delete' => 'Delete Marker',
                'management' => 'Marker\'s Management',
            ],
            'faq' => [
                'create' => 'Create Question',
                'edit' => 'Edit Question',
                'management' => 'FAQs Management',

                'table' => [
                    'id' => 'Id',
                    'question' => 'Question',
                    'answer' => 'Answer',
                    'created_at' => 'Created at'
                ],
            ],
            'zone' => [
                'create' => 'Create Zone',
                'edit' => 'Edit Zone',
                'management' => 'Zone\'s Management',

                'table' => [
                    'id' => 'Id',
                    'title' => 'Title',
                    'image' => 'Image Name',
                    'created_at' => 'Created at'
                ],
            ],
            'good' => [
                'create' => 'Create Goods',
                'edit' => 'Edit Goods',
                'management' => 'Goods Management',

                'table' => [
                    'id' => 'Id',
                    'name' => 'Name',
                    'created_at' => 'Created at'
                ],
            ],
            'showroom' => [
                'create' => 'Create Showroom',
                'edit' => 'Edit Showroom',
                'management' => 'Showrooms Management',

                'table' => [
                    'id' => 'Id',
                    'country' => 'Country',
                    'city' => 'City',
                    'name' => 'Name',
                ],
            ],
            'finishtissue' => [
                'create' => 'Create tissue',
                'edit' => 'Edit tissue',
                'management' => 'Tissues Management',

                'table' => [
                    'id' => 'Id',
                    'title' => 'Title',
                    'short' => 'Short'
                ],
            ],
            'popup' => [
                'edit' => 'Edit popup',
                'management' => 'Popups Management'
            ],
            'message' => [
                'show' => 'Show Message',
                'management' => 'All messages',
                'from' => 'From',
                'date' => 'Date',

                'table' => [
                    'name' => 'Name',
                    'new' => 'New',
                    'created_at' => 'Posted'
                ]
            ],


            'users' => [
                'active' => 'Active Users',
                'all_permissions' => 'All Permissions',
                'change_password' => 'Change Password',
                'change_password_for' => 'Change Password for :user',
                'create' => 'Create User',
                'deactivated' => 'Deactivated Users',
                'deleted' => 'Deleted Users',
                'edit' => 'Edit User',
                'management' => 'User Management',
                'no_permissions' => 'No Permissions',
                'no_roles' => 'No Roles to set.',
                'permissions' => 'Permissions',

                'table' => [
                    'confirmed' => 'Confirmed',
                    'created' => 'Created',
                    'email' => 'E-mail',
                    'id' => 'ID',
                    'last_updated' => 'Last Updated',
                    'name' => 'Name',
                    'first_name' => 'First Name',
                    'last_name' => 'Last Name',
                    'no_deactivated' => 'No Deactivated Users',
                    'no_deleted' => 'No Deleted Users',
                    'roles' => 'Roles',
                    'total' => 'user total|users total',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'history' => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar' => 'Avatar',
                            'confirmed' => 'Confirmed',
                            'created_at' => 'Created At',
                            'deleted_at' => 'Deleted At',
                            'email' => 'E-mail',
                            'last_updated' => 'Last Updated',
                            'name' => 'Name',
                            'first_name' => 'First Name',
                            'last_name' => 'Last Name',
                            'status' => 'Status',
                        ],
                    ],
                ],

                'view' => 'View User',
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title' => 'Login',
            'login_button' => 'Login',
            'login_with' => 'Login with :social_media',
            'register_box_title' => 'Register',
            'register_button' => 'Register',
            'remember_me' => 'Remember Me',
        ],

        'passwords' => [
            'forgot_password' => 'Forgot Your Password?',
            'reset_password_box_title' => 'Reset Password',
            'reset_password_button' => 'Reset Password',
            'send_password_reset_link_button' => 'Send Password Reset Link',
        ],

        'macros' => [
            'country' => [
                'alpha' => 'Country Alpha Codes',
                'alpha2' => 'Country Alpha 2 Codes',
                'alpha3' => 'Country Alpha 3 Codes',
                'numeric' => 'Country Numeric Codes',
            ],

            'macro_examples' => 'Macro Examples',

            'state' => [
                'mexico' => 'Mexico State List',
                'us' => [
                    'us' => 'US States',
                    'outlying' => 'US Outlying Territories',
                    'armed' => 'US Armed Forces',
                ],
            ],

            'territories' => [
                'canada' => 'Canada Province & Territories List',
            ],

            'timezone' => 'Timezone',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Change Password',
            ],

            'profile' => [
                'avatar' => 'Avatar',
                'created_at' => 'Created At',
                'edit_information' => 'Edit Information',
                'email' => 'E-mail',
                'last_updated' => 'Last Updated',
                'name' => 'Name',
                'first_name' => 'First Name',
                'last_name' => 'Last Name',
                'update_information' => 'Update Information',
            ],
        ],

    ],
];
