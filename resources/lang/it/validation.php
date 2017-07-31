<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute deve essere accettato.',
    'active_url'           => ':attribute non è un URL valido.',
    'after'                => ':attribute deve essere una data successiva a :date.',
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                => ':attribute può contenere solo lettere.',
    'alpha_dash'           => ':attribute può contenere solo lettere, numeri e trattini.',
    'alpha_num'            => ':attribute può contenere solo lettere e numeri.',
    'array'                => ':attribute deve essere un array.',
    'before'               => ':attribute deve essere una data precedente al :date.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => ':attribute deve avere un valore tra :min e :max.',
        'file'    => ':attribute deve essere tra :min e :max kilobytes.',
        'string'  => ':attribute deve avere tra :min e :max caratteri.',
        'array'   => ':attribute deve contenere tra :min e :max elementi.',
    ],
    'boolean'              => ':attribute può essere solo vero o falso.',
    'confirmed'            => 'La conferma di :attribute non corrisponde.',
    'date'                 => ':attribute non è una data valida.',
    'date_format'          => ':attribute non corrisponde al formato :format.',
    'different'            => ':attribute e :other devono essere diversi.',
    'digits'               => ':attribute deve avere :digits cifre.',
    'digits_between'       => ':attribute deve avere tra :min e :max cifre.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => ':attribute deve essere un indirizzo email valido.',
    'exists'               => 'La selezione per :attribute non è valida.',
    'file'                 => 'The :attribute must be a file.',
    'filled'               => ':attribute è obbligatorio.',
    'image'                => ":attribute deve essere un'immagine.",
    'in'                   => 'La selezione per :attribute non è valida.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => ':attribute deve essere un numero intero.',
    'ip'                   => ':attribute deve essere un indirizzo IP valido.',
    'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
    'json'                 => ':attribute deve essere una stringa JSON valida.',
    'max'                  => [
        'numeric' => ':attribute non può essere più grande di :max.',
        'file'    => ':attribute non può superare i :max kilobytes.',
        'string'  => ':attribute non può superare i :max caratteri.',
        'array'   => ':attribute non può avere più di :max elementi.',
    ],
    'mimes'                => ':attribute deve essere un file di questo formato: :values.',
    'min'                  => [
        'numeric' => ':attribute deve essere almeno :min.',
        'file'    => ':attribute deve essere di almeno :min kilobytes.',
        'string'  => ':attribute deve contenere almeno :min caratteri.',
        'array'   => ':attribute deve avere almeno :min elementi.',
    ],
    'not_in'               => 'Il valore selezionato per :attribute non è valido.',
    'numeric'              => ':attribute deve essere un numero.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'Il formato di :attribute non è valido.',
    'required'             => ':attribute è richiesto.',
    'required_if'          => ':attribute è richiesto quando :other è :value.',
    'required_unless'      => ':attribute è richiesto se :other non è tra :values.',
    'required_with'        => ':attribute è richiesto quando :values è presente.',
    'required_with_all'    => ':attribute è richiesto quando :values è presente.',
    'required_without'     => ':attribute è richiesto quando :values non è presente.',
    'required_without_all' => ':attribute è richiesto quando nessuno tra :values è presente.',
    'same'                 => ':attribute e :other devono essere identici.',
    'size'                 => [
        'numeric' => ':attribute deve essere :size.',
        'file'    => ':attribute deve essere di :size kilobytes.',
        'string'  => ':attribute deve contenere :size caratteri.',
        'array'   => ':attribute deve contenere :size elementi.',
    ],
    'string'               => ':attribute deve essere una stringa.',
    'timezone'             => ':attribute deve essere un fuso orario valido.',
    'unique'               => ':attribute è già stato utilizzato.',
    'url'                  => 'Il formato di :attribute non è valido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [

        'backend' => [
            'access' => [
                'admin_comment' => [
                    'comment' => 'Commento dell\'amministratore*'
                ],
                'permissions' => [
                    'associated_roles' => 'Ruoli associati',
                    'dependencies'     => 'Dipendenze',
                    'display_name'     => 'Nome visualizzato',
                    'group'            => 'Gruppo',
                    'group_sort'       => 'Ordina gruppo',

                    'groups' => [
                        'name' => 'Nome gruppo',
                    ],

                    'name'   => 'Nome',
                    'system' => 'Sistema?',
                ],

                'roles' => [
                    'associated_permissions' => 'Permessi associati',
                    'name'                   => 'Nome',
                    'sort'                   => 'Ordina',
                ],

                'page' => [
                    'pageKey' => 'Page key',
                    'title' => 'Titolo*',
                    'description' => 'Descrizione*',
                    'body' => 'Soddisfare*',
                    'title_ru' => 'Titolo[RU]*',
                    'body_ru' => 'Soddisfare[RU]*',
                    'title_it' => 'Titolo[IT]*',
                    'body_it' => 'Soddisfare[IT]*',
                ],

                'block' => [
                    'title' => 'Titolo*',
                    'preview' => 'Anteprima*',
                    'body' => 'Soddisfare*',
                    'title_ru' => 'Titolo[RU]*',
                    'body_ru' => 'Soddisfare[RU]*',
                    'title_it' => 'Titolo[IT]*',
                    'body_it' => 'Soddisfare[IT]*',
                    'image' => 'Immagine*',
                    'image_select' => 'Selezionare l\'immagine',
                ],

                'image' => [
                    'error' =>[
                        'dictFileTooBig' => 'Il file è troppo grande',
                        'dictFallbackMessage' => 'Il tuo browser non supporta il drag & drop',
                        'dictInvalidFileType' => 'tipo di file non valido',
                        'dictMaxFilesExceeded' => 'È stato superato il numero massimo di file caricati.',
                        'default_error' => 'Prova a caricare un formato di file diverso',
                        'title' => 'Caricamento di un oggetto',
                        'text' => 'Si è verificato un errore durante il caricamento del file.'
                    ],
                ],

                'news' => [
                    'type' => 'Tipo',
                    'type_news' => 'Notizia',
                    'type_press' => 'Presss',
                    'type_presentation' => 'Presentazione',
                    'type_video' => 'Video',
                    'type_showroom' => 'Showroom',
                    'title' => 'Titolo*',
                    'description' => 'Descrizione*',
                    'preview' => 'Anteprima*',
                    'body' => 'Soddisfare*',
                    'title_ru' => 'Titolo[RU]*',
                    'description_ru' => 'Descrizione[RU]*',
                    'preview_ru' => 'Anteprima[RU]*',
                    'body_ru' => 'Soddisfare[RU]*',
                    'title_it' => 'Titolo[IT]*',
                    'description_it' => 'Descrizione[IT]*',
                    'preview_it' => 'Anteprima[IT]*',
                    'body_it' => 'Soddisfare[IT]*',
                    'image' => 'Immagine',
                    'image_select' => 'Selezionare l\'immagine',
                ],

                'category' => [
                    'name' => 'Nome*',
                    'name_ru' => 'Nome[RU]*',
                    'name_it' => 'Nome[IT]*',
                    'image' => 'Immagine',
                    'image_select' => 'Selezionare l\'immagine',
                ],

                'collection' => [
                    'title' => 'Titolo*',
                    'prev' => 'Descrizione*',
                    'prev_ru' => 'Descrizione[RU]*',
                    'prev_it' => 'Descrizione[IT]*',
                    'banner' => 'Bandiera ?',
                    'description' => 'SEO*',
                    'description_ru' => 'SEO[RU]*',
                    'description_it' => 'SEO[IT]*',
                    'image' => 'Immagine*',
                    'image_select' => '',
                    'name' => 'Nome[Eng]*',
                    'name_ru' => 'Nome[Rus]*',
                    'name_it' => 'Nome[Itl]*',
                    'zones' => [
                        'mainZones' => 'Zona principale',
                        'title' => 'Titolo*',
                        'title_ru' => 'Titolo[RU]*',
                        'title_it' => 'Titolo[IT]*',
                        'name' => 'Nome[Eng]*',
                        'name_ru' => 'Nome[Rus]*',
                        'name_it' => 'Nome[Itl]*',
                        'description' => 'SEO*',
                        'description_ru' => 'SEO[RU]*',
                        'description_it' => 'SEO[IT]*',
                        'management' => 'Collezione-zone gestione',
                        'mainPhoto' => 'Foto principale?'
                    ]
                ],

                'faq' => [
                    'question' => 'Domanda*',
                    'answer' => 'Risposta*',
                    'question_ru' => 'Domanda[RU]*',
                    'answer_ru' => 'Risposta[RU]*',
                    'question_it' => 'Domanda[IT]*',
                    'answer_it' => 'Risposta[IT]*',
                ],

                'marker' => [
                    'title' => 'Titolo*',
                    'title_ru' => 'Titolo[RU]*',
                    'title_it' => 'Titolo[IT]*',
                    'code' => 'Codice*',
                ],

                'zone' => [
                    'title' => 'Titolo[Eng]*',
                    'title_ru' => 'Titolo[Rus]*',
                    'title_it' => 'Titolo[Itl]*',
                    'name' => 'Nome[Eng]*',
                    'name_ru' => 'Nome[Rus]*',
                    'name_it' => 'Nome[Itl]*',
                    'description' => 'SEO*',
                    'description_ru' => 'SEO[RU]*',
                    'description_it' => 'SEO[IT]*',
                    'image' => 'Immagine',
                ],

                'good' => [
                    'category_id' => 'Categoria*',
                    'collection_id' => 'Collezione*',
                    'zone_id' => 'Zone*',
                    'code' => 'Codice*',
                    'name' => 'Nome',
                    'dimensions' => 'Dimensioni',
                    'tissue' => 'Fazzoletto di carta',
                    'finish' => 'Finish',
                    'description' => 'Descrizione',
                ],

                'showroom' => [
                    'country' => 'Nazione*',
                    'city' => 'Città*',
                    'name' => 'Nome*',
                    'address' => 'Indirizzo',
                    'phone' => 'Telefono',
                    'phone2' => 'Telefono aggiuntivo',
                    'fax' => 'Fax',
                    'email' => 'E-mail'
                ],

                'finishtissue' => [
                    'title' => 'Titolo*',
                    'title_ru' => 'Titolo[RU]*',
                    'title_it' => 'Titolo[IT]*',
                    'type_finish' => 'Fazzoletto di carta',
                    'type_tissue' => 'Tissue',
                    'image' => 'Immagine',
                    'parent' => 'Parent',
                    'comment' => 'Comment',
                    'short' => 'Short name',
                ],

                'popup' => [
                    'title' => 'Titolo*',
                    'title_ru' => 'Titolo[RU]*',
                    'title_it' => 'Titolo[IT]*',
                    'show' => 'Mostrare*',
                    'body' => 'Soddisfare*',
                    'body_ru' => 'Soddisfare[RU]*',
                    'body_it' => 'Soddisfare[IT]*',
                    'image' => 'Immagine*',
                    'link' => 'Collegamento*'
                ],

                'templateMessage' => [
                    'title' => 'Titolo*',
                    'body' => 'Soddisfare*',
                    'title_ru' => 'Titolo[RU]*',
                    'body_ru' => 'Soddisfare[RU]*',
                    'title_it' => 'Titolo[IT]*',
                    'body_it' => 'Soddisfare[IT]*',
                    'type' => 'Tipo',

                ],
                'settings' => [
                    'soc_links' => 'Links*',
                    'discount_data' => 'Sconto*',
                    'koef_data' => 'Fattore(inch/cm)*',
                    'vat_data' => 'VAT*'

                ],
                'orders' => [
                    'user_fr_name' => 'Client first name',
                    'user_ls_name' => 'Client last name',
                    'user_email' => 'Client Email',
                    'summ' => 'Summ',
                    'cnt' => 'Count',

                    'status' => 'Status*',
                    'status_new' => 'New',
                    'status_sent' => 'Sent',
                    'status_delivering' => 'Delivering',
                    'status_closed' => 'Closed',
                ],
                'baskets' => [
                    'user_fr_name' => 'Client first name',
                    'user_ls_name' => 'Client last name',
                    'user_email' => 'Client Email',
                    'summ' => 'Summ',
                    'count' => 'Count',
                ],
                'sort' => [
                    'type_collection' => 'Sort by collection',
                    'type_category' => 'Sort by category',
                    'type_collectionZone' => 'Sort by zones',
                    'swal' => [
                        'title' => 'No product[IT]',
                        'text' => 'for this item'
                    ]
                ],
                'documents' => [
                    'name' => 'Nome*',
                    'link' => 'Links*',
                    'type' => 'Tipo*',
                    'type_design' => 'DESIGN KIT',
                    'type_press' => 'PRESS KIT',
                    'type_flash' => 'FLASH INFO',
                ],

                'users' => [
                    'active'                  => 'Attivo',
                    'associated_roles'        => 'Ruoli associati',
                    'confirmed'               => 'Confermato',
                    'email'                   => 'Indirizzo e-mail',
                    'name'                    => 'Nome',
                    'other_permissions'       => 'Altri permessi',
                    'password'                => 'Password',
                    'password_confirmation'   => 'Conferma password',
                    'send_confirmation_email' => 'Invia e-mail di conferma',
                ],
            ],
        ],

        'frontend' => [
            'email'                     => 'Indirizzo e-mail',
            'name'                      => 'Nome',
            'password'                  => 'Password',
            'password_confirmation'     => 'Conferma password',
            'old_password'              => 'Vecchia password',
            'new_password'              => 'Nuova password',
            'new_password_confirmation' => 'Conferma nuova password',
        ],
    ],

];
