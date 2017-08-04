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
        'all'     => 'Tutti',
        'yes'     => 'Sì',
        'no'      => 'No',
        'custom'  => 'Custom', // TODO TRANSLATION
        'actions' => 'Azioni',
        'active'  => 'Active',
        'buttons' => [
            'save'   => 'Salva',
            'update' => 'Aggiorna',
        ],
        'hide'              => 'Nascondi',
        'inactive'          => 'Inactive',
        'none'              => 'Nessuno',
        'show'              => 'Visualizza',
        'toggle_navigation' => 'Menu Navigazione',
    ],

    'backend' => [
        'settings' => [
            'management' => 'Settings',
        ],
        'basket' => [
            'management' => 'Users baskets',
        ],
        'order' => [
            'management' => 'Orders',
        ],
        'access' => [
            'roles' => [
                'create'     => 'Crea ruolo',
                'edit'       => 'Modifica ruolo',
                'management' => 'Gestione ruolo',

                'table' => [
                    'number_of_users' => 'Numero di utenti',
                    'permissions'     => 'Permessi',
                    'role'            => 'Ruolo',
                    'sort'            => 'Ordina',
                    'total'           => 'Ruolo|Totale ruoli',
                ],
            ],


            'page' => [
                'create'     => 'Crea pagina',
                'edit'       => 'Modifica pagina',
                'management' => 'Gestione pagina',

                'table' => [
                    'id' => 'Id',
                    'pageKey' => 'Page Key',
                    'title' => 'Titulo',
                    'created_at' => 'Creato a'
                ],
            ],
            'block' => [
                'create'     => 'Crea bloccare',
                'edit'       => 'Modifica bloccare',
                'management' => 'Gestione bloccare',

                'table' => [
                    'id' => 'Id',
                    'title' => 'Titulo',
                    'image' => 'Immagine',
                    'created_at' => 'Creato a'
                ],
            ],
            'news' => [
                'create'     => 'Crea notizia',
                'edit'       => 'Modifica notizia',
                'management' => 'Gestione notizia',

                'table' => [
                    'id' => 'Id',
                    'title' => 'Titulo',
                    'type' => 'Tipo',
                    'image' => 'Immagine',
                    'created_at' => 'Creato a'
                ],
            ],
            'category' => [
                'create'     => 'Crea categoria',
                'edit'       => 'Modifica categoria',
                'management' => 'Gestione categoria',
                'delete' => 'Elimina categoria',
            ],
            'collection' => [
                'create'     => 'Crea collezione',
                'edit'       => 'Modifica collezione',
                'management' => 'Gestione collezione',

                'table' => [
                    'id' => 'Id',
                    'title' => 'Titulo',
                    'image' => 'Immagine',
                    'banner' => 'bandiera',
                    'created_at' => 'Creato a'
                ],
                'zones' => [
                    'management' => 'Collection-Zones Management'
                ]
            ],
            'marker' => [
                'create'     => 'Crea marcatore',
                'edit'       => 'Modifica marcatore',
                'management' => 'Gestione marcatore',
            ],
            'faq' => [
                'create'     => 'Crea FAQ',
                'edit'       => 'Modifica FAQ',
                'management' => 'Gestione FAQ',

                'table' => [
                    'id' => 'Id',
                    'question' => 'Domanda',
                    'answer' => 'Risposta',
                    'created_at' => 'Creato a'
                ],
            ],
            'zone' => [
                'create'     => 'Crea zone',
                'edit'       => 'Modifica zone',
                'management' => 'Gestione zone',

                'table' => [
                    'id' => 'Id',
                    'title' => 'Titulo',
                    'image' => 'Immagine',
                    'created_at' => 'Creato a'
                ],
            ],
            'product' => [
                'create' => 'Create Goods[IT]',
                'edit' => 'Edit Goods[IT]',
                'management' => 'Goods Management[IT]',
                'management_full' => 'Full data Management[IT]',

                'table' => [
                    'id' => 'Id',
                    'name' => 'Name[IT]',
                    'price' => 'Price[IT]',
                    'slug' => 'Slug[IT]',
                    'parent_code' => 'Parent code[IT]',
                    'child_code' => 'Child code[IT]',
                    'child_name' => 'Child name[IT]',
                    'parent_name' => 'Parent name[IT]',
                    'photo' => 'Photo[IT]',
                    'collection_name' => 'Collection[IT]',
                    'collection_zone_name' => 'Col-zon[IT]',
                    'zone_name' => 'Zone[IT]',
                    'finish' => 'Finishes[IT]',
                    'tissue' => 'Tissue[IT]',
                    'category' => 'Categories[IT]',
                    'comments' => 'Comments[IT]',
                    'published' => 'Published',

                    'created_at' => 'Created at[IT]',
                    'updated_at' => 'Updated at[IT]'
                ],
            ],
            'showroom' => [
                'create'     => 'Crea showroom',
                'edit'       => 'Modifica showroom',
                'management' => 'Gestione showroom',

                'table' => [
                    'id' => 'Id',
                    'country' => 'Nazione',
                    'city' => 'Città',
                    'name' => 'Nome',
                ],
            ],
            'finishtissue' => [
                'create'     => 'Crea fazzoletto di carta',
                'edit'       => 'Modifica fazzoletto di carta',
                'management' => 'Gestione fazzoletto di carta',

                'table' => [
                    'id' => 'Id',
                    'title' => 'Titulo',
                    'short' => 'Short'
                ],
            ],
            'popup' => [
                'edit'       => 'Modifica apparire',
                'management' => 'Gestione apparire',
            ],
            'settings' => [
                'edit'       => 'Modifica impostazioni',
                'management' => 'Gestione impostazioni',
            ],
            'message' => [
                'show' => 'Mostra il messaggio',
                'management' => 'Tutti i messaggi',
                'from' => 'A partire dal',
                'date' => 'Data',

                'table' => [
                    'name' => 'Nome',
                    'email' => 'Email',
                    'new' => 'Nuovo',
                    'created_at' => 'Postato'
                ]
            ],
            'templateMessage' => [
                'create'     => 'Crea modello',
                'edit'       => 'Modifica modello',
                'management' => 'Messaggio di modello',

                'table' => [
                    'id' => 'Id',
                    'type' => 'Tipo',
                    'title' => 'Titolo',
                ],
            ],
            'orders' => [
                'edit' => 'Modifica orders',
                'management' => 'Orders Gestione',
                'table' => [
                    'id' => 'Id',
                    'status' => 'Status',
                    'user_id' => 'Client email',
                    'summ' => 'Summ',
                    'created_at' => 'Created at'
                ],
            ],
            'baskets' => [
                'show' => 'Show basket',
                'management' => 'Baskets Management',
                'table' => [
                    'id' => 'Id',
                    'user_id' => 'Client email',
                    'summ' => 'Summ',
                    'created_at' => 'Created at'
                ],
            ],
            'sort' => [
                'management' => 'Sort products[IT]',

            ],
            'documents' => [
                'create'     => 'Crea document',
                'edit'       => 'Modifica document',
                'management' => 'Messaggio di document',

                'table' => [
                    'id' => 'Id',
                    'type' => 'Tipo',
                    'name' => 'Nome',
                    'link' => 'Links',
                    'created_at' => 'Created at'
                ],
            ],


            'users' => [
                'active'              => 'Utenti attivi',
                'all_permissions'     => 'Tutti i permessi',
                'change_password'     => 'Cambia password',
                'change_password_for' => 'Cambia password per :user',
                'create'              => 'Crea utente',
                'deactivated'         => 'Utenti disattivati',
                'deleted'             => 'Utenti eliminati',
                'edit'                => 'Modifica utente',
                'management'          => 'Gestione utente',
                'no_permissions'      => 'Nessun permesso',
                'no_roles'            => 'Nessuno ruolo da assegnare.',
                'permissions'         => 'Permessi',

                'table' => [
                    'confirmed'      => 'Confermato',
                    'created'        => 'Creato',
                    'email'          => 'E-mail',
                    'id'             => 'ID',
                    'last_updated'   => 'Ultimo aggiornamento',
                    'name'           => 'Nome',
                    'no_deactivated' => 'Nessun utente disattivato',
                    'no_deleted'     => 'Nessun utente eliminato',
                    'roles'          => 'Ruoli',
                    'total'          => 'utente(i) totali', // TODO: pluralization
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'history'  => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar'       => 'Avatar',
                            'confirmed'    => 'Confirmed',
                            'created_at'   => 'Creato a',
                            'deleted_at'   => 'Deleted At',
                            'email'        => 'E-mail',
                            'last_updated' => 'Last Updated',
                            'name'         => 'Name',
                            'status'       => 'Status',
                        ],
                    ],
                ],

                'view' => 'View User',
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title'    => 'Login',
            'login_button'       => 'Login',
            'login_with'         => 'Login tramite :social_media',
            'register_box_title' => 'Registrazione',
            'register_button'    => 'Registrati',
            'remember_me'        => 'Ricordami',
        ],

        'passwords' => [
            'forgot_password'                 => 'Password dimenticata?',
            'reset_password_box_title'        => 'Reset password',
            'reset_password_button'           => 'Reset password',
            'send_password_reset_link_button' => 'Invia link per il reset della password',
        ],

        'macros' => [
            'country' => [
                'alpha'   => 'Codici di Paese alfabetici',
                'alpha2'  => 'Codici di Paese alfabetici 2',
                'alpha3'  => 'Codici di Paese alfabetici 3',
                'numeric' => 'Codici di Paese numerici',
            ],

            'macro_examples' => 'Esempi di macro',

            'state' => [
                'mexico' => 'Elenco di stati del Messico',
                'us'     => [
                    'us'       => 'Stati degli USA',
                    'outlying' => 'Territori remoti degli USA',
                    'armed'    => 'Forze armate USA',
                ],
            ],

            'territories' => [
                'canada' => 'Province e Territori del Canada',
            ],

            'timezone' => 'Fuso orario',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Change Password',
            ],

            'profile' => [
                'avatar'             => 'Avatar',
                'created_at'         => 'Data di creazione',
                'edit_information'   => 'Modifica informazioni',
                'email'              => 'E-mail',
                'last_updated'       => 'Ultimo aggiornamento',
                'name'               => 'Nome',
                'update_information' => 'Aggiorna informazioni',
            ],
        ],

    ],
];
