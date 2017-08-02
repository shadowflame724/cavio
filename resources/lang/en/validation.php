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

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'The :attribute is not a valid date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values is present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',

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
            'admin_comment' => [
                'comment' => 'Administrator comment*'
            ],
            'access' => [
                'permissions' => [
                    'associated_roles' => 'Associated Roles',
                    'dependencies' => 'Dependencies',
                    'display_name' => 'Display Name',
                    'group' => 'Group',
                    'group_sort' => 'Group Sort',

                    'groups' => [
                        'name' => 'Group Name',
                    ],

                    'name' => 'Name',
                    'first_name' => 'First Name',
                    'last_name' => 'Last Name',
                    'system' => 'System',
                ],

                'roles' => [
                    'associated_permissions' => 'Associated Permissions',
                    'name' => 'Name',
                    'sort' => 'Sort',
                ],
                'page' => [
                    'pageKey' => 'Page key',
                    'title' => 'Title*',
                    'body' => 'Content*',
                    'title_ru' => 'Title[RU]*',
                    'body_ru' => 'Content[RU]*',
                    'title_it' => 'Title[IT]*',
                    'body_it' => 'Content[IT]*',
                    'description' => 'Description*',
                ],
                'block' => [
                    'title' => 'Title*',
                    'preview' => 'Preview*',
                    'body' => 'Content*',
                    'image' => 'Image*',
                    'image_select' => 'Select image',
                    'title_ru' => 'Title[RU]*',
                    'body_ru' => 'Content[RU]*',
                    'title_it' => 'Title[IT]*',
                    'body_it' => 'Content[IT]*',
                ],
                'image' => [
                    'error' => [
                        'dictFileTooBig' => 'File is too big',
                        'dictFallbackMessage' => 'Your browser does not support drag & drop',
                        'dictInvalidFileType' => 'Invalid file type',
                        'dictMaxFilesExceeded' => 'The maximum number of uploaded files has been exceeded.',
                        'default_error' => 'Try uploading a different file format',
                        'title' => 'Loading an object',
                        'text' => 'There was an error uploading the file.'
                    ],
                ],

                'news' => [
                    'type' => 'Type',
                    'name' => 'Name*',
                    'name_ru' => 'Name[RU]*',
                    'name_it' => 'Name[IT]*',
                    'title' => 'Title*',
                    'description' => 'Description*',
                    'preview' => 'Preview*',
                    'body' => 'Content*',
                    'title_ru' => 'Title[RU]*',
                    'description_ru' => 'Description[RU]*',
                    'preview_ru' => 'Preview[RU]*',
                    'body_ru' => 'Content[RU]*',
                    'title_it' => 'Title[IT]*',
                    'description_it' => 'Description[IT]*',
                    'preview_it' => 'Preview[IT]*',
                    'body_it' => 'Content[IT]*',
                    'image' => 'Image',
                    'image_select' => 'Select image',
                ],
                'category' => [
                    'name' => 'Name*',
                    'name_ru' => 'Name[RU]*',
                    'name_it' => 'Name[IT]*',
                    'image' => 'Image',
                    'image_select' => 'Select image',
                ],

                'collection' => [
                    'title' => 'Title*',
                    'name' => 'Name*',
                    'name_ru' => 'Name[RU]*',
                    'name_it' => 'Name[IT]*',
                    'prev' => 'Preview*',
                    'prev_ru' => 'Preview[RU]*',
                    'prev_it' => 'Preview[IT]*',
                    'description' => 'SEO*',
                    'title_ru' => 'Title[RU]*',
                    'description_ru' => 'SEO[RU]*',
                    'title_it' => 'Title[IT]*',
                    'description_it' => 'SEO[IT]*',
                    'banner' => 'Banner ?',
                    'image' => 'Image*',
                    'image_select' => 'Select image',
                    'zones' => [
                        'mainZones' => 'Main Zone',
                        'title' => 'Title',
                        'title_ru' => 'Title[RU]',
                        'title_it' => 'Title[IT]',
                        'name' => 'Name*',
                        'name_ru' => 'Name[RU]*',
                        'name_it' => 'Name[IT]*',
                        'description' => 'SEO*',
                        'description_ru' => 'SEO[RU]*',
                        'description_it' => 'SEO[IT]*',

                        'management' => 'Collection-zones management',
                        'mainPhoto' => 'Main photo?'
                    ]
                ],

                'faq' => [
                    'question' => 'Question*',
                    'answer' => 'Answer*',
                    'question_ru' => 'Question[RU]*',
                    'answer_ru' => 'Answer[RU]*',
                    'question_it' => 'Question[IT]*',
                    'answer_it' => 'Answer[IT]*',
                ],
                'marker' => [
                    'title' => 'Title*',
                    'title_ru' => 'Title[RU]*',
                    'title_it' => 'Title[IT]*',
                    'code' => 'Code*',
                ],
                'zone' => [
                    'title' => 'Title[Eng]*',
                    'title_ru' => 'Title[Rus]*',
                    'title_it' => 'Title[Itl]*',
                    'name' => 'Name*',
                    'name_ru' => 'Name[RU]*',
                    'name_it' => 'Name[IT]*',
                    'description' => 'SEO*',
                    'description_ru' => 'SEO[RU]*',
                    'description_it' => 'SEO[IT]*',
                    'image' => 'Image',
                ],
                'good' => [
                    'category_id' => 'Category*',
                    'collection_id' => 'Collection*',
                    'zone_id' => 'Zone*',
                    'code' => 'Code*',
                    'name' => 'Name',
                    'dimensions' => 'Dimensions',
                    'tissue' => 'Tissue',
                    'finish' => 'Finish',
                    'description' => 'Description',
                ],
                'showroom' => [
                    'country' => 'Country*',
                    'city' => 'City*',
                    'name' => 'Name*',
                    'address' => 'Address',
                    'phone' => 'Phone',
                    'phone2' => 'Additional phone',
                    'fax' => 'Fax',
                    'email' => 'Email'
                ],
                'finishtissue' => [
                    'title' => 'Title*',
                    'title_ru' => 'Title[RU]*',
                    'title_it' => 'Title[IT]*',
                    'type' => 'Type',
                    'type_finish' => 'Finish',
                    'type_tissue' => 'Tissue',
                    'parent' => 'Parent',
                    'comment' => 'Comment',
                    'short' => 'Short name',

                    'image' => 'Image',
                ],
                'popup' => [
                    'title' => 'Title*',
                    'title_ru' => 'Title[RU]*',
                    'title_it' => 'Title[IT]*',
                    'show' => 'Show*',
                    'body' => 'Content*',
                    'body_ru' => 'Content[RU]*',
                    'body_it' => 'Content[IT]*',
                    'image' => 'Image*',
                    'link' => 'Link*'
                ],
                'sort' => [
                    'type_collection' => 'Sort by collection',
                    'type_category' => 'Sort by category',
                    'type_collectionZone' => 'Sort by zones',
                    'swal' => [
                        'title' => 'No products',
                        'text' => 'for this item'
                    ]
                ],
                'documents' => [
                    'name' => 'Name*',
                    'link' => 'Links*',
                    'type' => 'Type*',
                    'type_design' => 'DESIGN KIT',
                    'type_press' => 'PRESS KIT',
                    'type_flash' => 'FLASH INFO',
                ],
                'users' => [
                    'active' => 'Active',
                    'associated_roles' => 'Associated Roles',
                    'confirmed' => 'Confirmed',
                    'email' => 'E-mail Address',
                    'name' => 'Name',
                    'last_name' => 'Last Name',
                    'first_name' => 'First Name',
                    'other_permissions' => 'Other Permissions',
                    'password' => 'Password',
                    'password_confirmation' => 'Password Confirmation',
                    'send_confirmation_email' => 'Send Confirmation E-mail',
                ],
                'templateMessage' => [
                    'title' => 'Title*',
                    'body' => 'Content*',
                    'title_ru' => 'Title[RU]*',
                    'body_ru' => 'Content[RU]*',
                    'title_it' => 'Title[IT]*',
                    'body_it' => 'Content[IT]*',
                    'type' => 'Type*',
                ],
                'settings' => [
                    'soc_links' => 'Links*',
                    'discount_data' => 'Discount*',
                    'koef_data' => 'Coefficient(inch/cm)*',
                    'vat_data' => 'VAT*',
                    'news_types' => 'News types*',
                    'news_types_ru' => 'News types[RU]*',
                    'news_types_it' => 'News types[IT]*'
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
                    'updated_at' => 'Last updated'
                ],


            ],
        ],

        'frontend' => [
            'email' => 'E-mail Address',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone' => 'Phone',
            'region' => 'Region',
            'password' => 'Password',
            'password_confirmation' => 'Password Confirmation',
            'old_password' => 'Old Password',
            'new_password' => 'New Password',
            'new_password_confirmation' => 'New Password Confirmation',
        ],
    ],

];
