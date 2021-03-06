<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Языковые ресурсы для проверки значений
    |--------------------------------------------------------------------------
    |
    | Последующие языковые строки содержат сообщения по-умолчанию, используемые
    | классом, проверяющим значения (валидатором). Некоторые из правил имеют
    | несколько версий, например, size. Вы можете поменять их на любые
    | другие, которые лучше подходят для вашего приложения.
    |
    */

    'accepted' => 'Вы должны принять :attribute.',
    'active_url' => 'Поле :attribute содержит недействительный URL.',
    'after' => 'В поле :attribute должна быть дата после :date.',
    'after_or_equal' => 'В поле :attribute должна быть дата после или равняться :date.',
    'alpha' => 'Поле :attribute может содержать только буквы.',
    'alpha_dash' => 'Поле :attribute может содержать только буквы, цифры и дефис.',
    'alpha_num' => 'Поле :attribute может содержать только буквы и цифры.',
    'array' => 'Поле :attribute должно быть массивом.',
    'before' => 'В поле :attribute должна быть дата до :date.',
    'before_or_equal' => 'В поле :attribute должна быть дата до или равняться :date.',
    'between' => [
        'array' => 'Количество элементов в поле :attribute должно быть между :min и :max.',
        'file' => 'Размер файла в поле :attribute должен быть между :min и :max Килобайт(а).',
        'numeric' => 'Поле :attribute должно быть между :min и :max.',
        'string' => 'Количество символов в поле :attribute должно быть между :min и :max.',
    ],
    'boolean' => 'Поле :attribute должно иметь значение логического типа.',
    'confirmed' => 'Поле :attribute не совпадает с подтверждением.',
    'date' => 'Поле :attribute не является датой.',
    'date_format' => 'Поле :attribute не соответствует формату :format.',
    'different' => 'Поля :attribute и :other должны различаться.',
    'digits' => 'Длина цифрового поля :attribute должна быть :digits.',
    'digits_between' => 'Длина цифрового поля :attribute должна быть между :min и :max.',
    'dimensions' => 'Поле :attribute имеет недопустимые размеры изображения.',
    'distinct' => 'Поле :attribute содержит повторяющееся значение.',
    'email' => 'Поле :attribute должно быть действительным электронным адресом.',
    'exists' => 'Выбранное значение для :attribute некорректно.',
    'file' => 'Поле :attribute должно быть файлом.',
    'filled' => 'Поле :attribute обязательно для заполнения.',
    'image' => 'Поле :attribute должно быть изображением.',
    'in' => 'Выбранное значение для :attribute ошибочно.',
    'in_array' => 'Поле :attribute не существует в :other.',
    'integer' => 'Поле :attribute должно быть целым числом.',
    'ip' => 'Поле :attribute должно быть действительным IP-адресом.',
    'json' => 'Поле :attribute должно быть JSON строкой.',
    'max' => [
        'array' => 'Количество элементов в поле :attribute не может превышать :max.',
        'file' => 'Размер файла в поле :attribute не может быть более :max Килобайт(а).',
        'numeric' => 'Поле :attribute не может быть более :max.',
        'string' => 'Количество символов в поле :attribute не может превышать :max.',
    ],
    'mimes' => 'Поле :attribute должно быть файлом одного из следующих типов: :values.',
    'mimetypes' => 'Поле :attribute должно быть файлом одного из следующих типов: :values.',
    'min' => [
        'array' => 'Количество элементов в поле :attribute должно быть не менее :min.',
        'file' => 'Размер файла в поле :attribute должен быть не менее :min Килобайт(а).',
        'numeric' => 'Поле :attribute должно быть не менее :min.',
        'string' => 'Количество символов в поле :attribute должно быть не менее :min.',
    ],
    'not_in' => 'Выбранное значение для :attribute ошибочно.',
    'numeric' => 'Поле :attribute должно быть числом.',
    'present' => 'Поле :attribute должно присутствовать.',
    'regex' => 'Поле :attribute имеет ошибочный формат.',
    'required' => 'Поле :attribute обязательно для заполнения.',
    'required_if' => 'Поле :attribute обязательно для заполнения, когда :other равно :value.',
    'required_unless' => 'Поле :attribute обязательно для заполнения, когда :other не равно :values.',
    'required_with' => 'Поле :attribute обязательно для заполнения, когда :values указано.',
    'required_with_all' => 'Поле :attribute обязательно для заполнения, когда :values указано.',
    'required_without' => 'Поле :attribute обязательно для заполнения, когда :values не указано.',
    'required_without_all' => 'Поле :attribute обязательно для заполнения, когда ни одно из :values не указано.',
    'same' => 'Значение :attribute должно совпадать с :other.',
    'size' => [
        'array' => 'Количество элементов в поле :attribute должно быть равным :size.',
        'file' => 'Размер файла в поле :attribute должен быть равен :size Килобайт(а).',
        'numeric' => 'Поле :attribute должно быть равным :size.',
        'string' => 'Количество символов в поле :attribute должно быть равным :size.',
    ],
    'string' => 'Поле :attribute должно быть строкой.',
    'timezone' => 'Поле :attribute должно быть действительным часовым поясом.',
    'unique' => 'Такое значение поля :attribute уже существует.',
    'uploaded' => 'Загрузка поля :attribute не удалась.',
    'url' => 'Поле :attribute имеет ошибочный формат.',

    /*
    |--------------------------------------------------------------------------
    | Собственные языковые ресурсы для проверки значений
    |--------------------------------------------------------------------------
    |
    | Здесь Вы можете указать собственные сообщения для атрибутов.
    | Это позволяет легко указать свое сообщение для заданного правила атрибута.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Собственные названия атрибутов
    |--------------------------------------------------------------------------
    |
    | Последующие строки используются для подмены программных имен элементов
    | пользовательского интерфейса на удобочитаемые. Например, вместо имени
    | поля "email" в сообщениях будет выводиться "электронный адрес".
    */

    'attributes' => [
        'backend' => [
            'admin_comment' => [
                'comment' => 'Коментарий администратора*'
            ],
            'access' => [
                'permissions' => [
                    'associated_roles' => 'Связь с ролями',
                    'dependencies' => 'Зависимости',
                    'display_name' => 'Отображаемое имя',
                    'group' => 'Группа',
                    'group_sort' => 'Сортировать по Группам',
                    'groups' => [
                        'name' => 'Название Группы',
                    ],
                    'name' => 'Название',
                    'system' => 'Системный?',
                ],
                'roles' => [
                    'associated_permissions' => 'Разрешения',
                    'name' => 'Название',
                    'sort' => 'Позиция',
                ],
                'page' => [
                    'pageKey' => 'Ключ страницы',
                    'title' => 'SEO Title',
                    'description' => 'Описание*',
                    'description_ru' => 'Описание[RU]*',
                    'description_it' => 'Описание[IT]*',
                    'body' => 'Контент*',
                    'title_ru' => 'SEO Title[RU]',
                    'body_ru' => 'Контент[RU]*',
                    'title_it' => 'SEO Title[IT]',
                    'body_it' => 'Контент[IT]*',
                ],
                'block' => [
                    'title' => 'SEO Title',
                    'preview' => 'Предварительный просмотр*',
                    'body' => 'Контент*',
                    'image' => 'Изображение',
                    'image_select' => 'Выберите изображение',
                    'title_ru' => 'SEO Title[RU]',
                    'body_ru' => 'Контент[RU]*',
                    'title_it' => 'SEO Title[IT]',
                    'body_it' => 'Контент[IT]*',
                ],
                'news' => [
                    'type' => 'Тип',
                    'name' => 'Название*',
                    'name_ru' => 'Название[RU]*',
                    'name_it' => 'Название[IT]*',
                    'title' => 'SEO Title',
                    'description' => 'Описание*',
                    'preview' => 'Предварительный просмотр*',
                    'body' => 'Контент*',
                    'title_ru' => 'SEO Title[RU]',
                    'description_ru' => 'Описание[RU]*',
                    'preview_ru' => 'Предварительный просмотр[RU]*',
                    'body_ru' => 'Контент[RU]*',
                    'title_it' => 'SEO Title[IT]',
                    'description_it' => 'Описание[IT]*',
                    'preview_it' => 'Предварительный просмотр[IT]*',
                    'body_it' => 'Контент[IT]*',
                    'image' => 'Изображение',
                    'image_select' => 'Выберите изображение',
                ],
                'category' => [
                    'name' => 'Название*',
                    'name_ru' => 'Название[RU]*',
                    'name_it' => 'Название[IT]*',
                    'title' => 'SEO Title',
                    'title_ru' => 'SEO Title[RU]',
                    'title_it' => 'SEO Title[IT]',
                    'description' => 'SEO*',
                    'description_ru' => 'SEO[RU]*',
                    'description_it' => 'SEO[IT]*',
                    'image' => 'Изображение',
                    'image_select' => 'Выберите изображение',
                ],
                'collection' => [
                    'title' => 'SEO Title',
                    'title_ru' => 'SEO Title[RU]',
                    'title_it' => 'SEO Title[IT]',
                    'banner' => 'Баннер ?',
                    'name' => 'Название*',
                    'name_ru' => 'Название[RU]*',
                    'name_it' => 'Название[IT]*',
                    'description' => 'SEO*',
                    'description_ru' => 'SEO[RU]*',
                    'description_it' => 'SEO[IT]*',
                    'prev' => 'Описание*',
                    'prev_ru' => 'Описание[RU]*',
                    'prev_it' => 'Описание[IT]*',
                    'image' => 'Изображение*',
                    'image_select' => 'Выберите изображение',
                    'zones' => [
                        'mainZones' => 'Зона',
                        'title' => 'SEO Title',
                        'title_ru' => 'SEO Title[RU]',
                        'title_it' => 'SEO Title[IT]',
                        'name' => 'Название*',
                        'name_ru' => 'Название[RU]*',
                        'name_it' => 'Название[IT]*',
                        'description' => 'SEO description',
                        'description_ru' => 'SEO description[RU]',
                        'description_it' => 'SEO description[IT]',

                        'management' => 'Управление зонами-коллекций',
                    ]
                ],
                'zone' => [
                    'title' => 'SEO Title',
                    'title_ru' => 'SEO Title[RU]',
                    'title_it' => 'SEO Title[IT]',
                    'name' => 'Название*',
                    'name_ru' => 'Название[RU]*',
                    'name_it' => 'Название[IT]*',
                    'description' => 'SEO*',
                    'description_ru' => 'SEO[RU]*',
                    'description_it' => 'SEO[IT]*',
                    'image' => 'Изображение',
                ],
                'faq' => [
                    'question' => 'Вопрос*',
                    'answer' => 'Ответ*',
                    'question_ru' => 'Вопрос[RU]*',
                    'answer_ru' => 'Ответ[RU]*',
                    'question_it' => 'Вопрос[IT]*',
                    'answer_it' => 'Ответ[IT]*',
                ],
                'marker' => [
                    'title' => 'Заголовок*',
                    'title_ru' => 'Заголовок[RU]*',
                    'title_it' => 'Заголовок[IT]*',
                    'code' => 'Артикул*',
                ],
                'good' => [
                    'category_id' => 'Категория*',
                    'collection_id' => 'Коллекция*',
                    'zone_id' => 'Зона*',
                    'code' => 'Артикул*',
                    'name' => 'Название',
                    'dimensions' => 'Габариты',
                    'tissue' => 'tissue',
                    'finish' => 'finish',
                    'description' => 'Описание',
                ],
                'showroom' => [
                    'country' => 'Страна*',
                    'country_ru' => 'Страна[RU]*',
                    'country_it' => 'Страна[IT]*',
                    'city' => 'Город*',
                    'city_ru' => 'Город[RU]*',
                    'city_it' => 'Город[IT]*',
                    'name' => 'Название*',
                    'name_ru' => 'Название[RU]*',
                    'name_it' => 'Название[IT]*',
                    'address' => 'Адрес',
                    'address_ru' => 'Адрес[RU]',
                    'address_it' => 'Адрес[IT]',
                    'phone' => 'Телефон',
                    'phone2' => 'Дополнительный телефон',
                    'fax' => 'Факс',
                    'email' => 'Емейл'
                ],
                'finishtissue' => [
                    'title' => 'Название*',
                    'title_ru' => 'Название[RUS]*',
                    'title_it' => 'Название[IT]*',
                    'image' => 'Изображение',
                    'parent' => 'Родитель-тип',
                    'comment' => 'Коментарий',
                    'short' => 'Короткое имя',
                ],
                'popup' => [
                    'title' => 'Заголовок',
                    'title_ru' => 'Заголовок[RU]',
                    'title_it' => 'Заголовок[IT]',
                    'show' => 'Показ*',
                    'body' => 'Контент*',
                    'body_ru' => 'Контент[RU]*',
                    'body_it' => 'Контент[IT]*',
                    'image' => 'Изображение*',
                    'link' => 'Ссылка*'
                ],
                'settings' => [
                    'soc_links' => 'Ссылки*',
                    'discount_data' => 'Скидки*',
                    'koef_data' => 'Коэффициент(дюйм/см)*',
                    'vat_data' => 'VAT*',
                    'news_types' => "Типы новостей",
                    'news_types_ru' => 'Типы новостей[RU]*',
                    'news_types_it' => 'Типы новостей[IT]*'

                ],

                'templateMessage' => [
                    'title' => 'Title',
                    'body' => 'Контент*',
                    'title_ru' => 'Title[RU]',
                    'body_ru' => 'Контент[RU]*',
                    'title_it' => 'Title[IT]',
                    'body_it' => 'Контент[IT]*',
                    'type' => 'Тип*'
                ],
                'users' => [
                    'active' => 'Активный',
                    'associated_roles' => 'Роли',
                    'confirmed' => 'Подтверждён',
                    'email' => 'E-mail',
                    'name' => 'Логин',
                    'other_permissions' => 'Прочие разрешения',
                    'password' => 'Новый пароль',
                    'password_confirmation' => 'Проверка пароля',
                    'send_confirmation_email' => 'Отправить подтверждение на E-mail',
                ],
                'orders' => [
                    'user_fr_name' => 'Имя клиента',
                    'user_ls_name' => 'Фамилия клиента',
                    'user_email' => 'email клиента',
                    'summ' => 'Сумма',
                    'cnt' => 'Количество',

                    'status' => 'Статус*',
                    'status_new' => 'Новый',
                    'status_sent' => 'Отправлен',
                    'status_delivering' => 'Доставляется',
                    'status_closed' => 'Закрыт',
                ],
                'baskets' => [
                    'user_fr_name' => 'Имя клиента',
                    'user_ls_name' => 'Фамилия клиента',
                    'user_email' => 'email клиента',
                    'summ' => 'Сумма',
                    'count' => 'Количество',
                    'updated_at' => 'Последнее изменение'
                ],
                'sort' => [
                    'type_collection' => 'Сортировка по коллекциям',
                    'type_category' => 'Сортировка по категориям',
                    'type_collectionZone' => 'Сортировка по зонам',
                    'swal' => [
                        'title' => 'Нет товаров',
                        'text' => 'Для выбранного элемента'
                    ]
                ],
                'documents' => [
                    'name' => 'Имя*',
                    'link' => 'Ссылки*',
                    'type' => 'Тип*',
                    'type_design' => 'DESIGN KIT',
                    'type_press' => 'PRESS KIT',
                    'type_flash' => 'FLASH INFO',
                ],
                'image' => [
                    'error' =>[
                        'dictFileTooBig' => 'Слишком большой файл',
                        'dictFallbackMessage' => 'Ваш браузер не поддерживает drag & drop',
                        'dictInvalidFileType' => 'Неверный тип файла',
                        'dictMaxFilesExceeded' => 'Превышено максимально допустимое количество загружаемых файлов.',
                        'default_error' => 'Попробуйте загрузить файл другого формата',
                        'title' => 'Загрузка объекта',
                        'text' => 'Произошла ошибка загрузки файла.'
                    ],
                ],
            ],
        ],
        'frontend' => [
            'email' => 'E-mail',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'phone' => 'Телефон',
            'region' => 'Регион',
            'new_password' => 'Новый пароль',
            'new_password_confirmation' => 'Подтверждение нового пароля',
            'old_password' => 'Старый пароль',
            'password' => 'Пароль',
            'password_confirmation' => 'Подтверждение пароля',
        ],
    ],
];
