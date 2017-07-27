<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Языковые ресурсы названий Labels
    |--------------------------------------------------------------------------
    |
    | Следующие языковые ресурсы используются в названиях
    | Labels всего вашего приложения.
    | Вы можете свободно изменять эти языковые ресурсы в соответствии
    | с требованиями вашего приложения.
    |
    */

    'backend' => [
        'settings' => [
            'management' => 'Настройки',
        ],
        'basket' => [
            'management' => 'Корзины пользователей',
        ],
        'order' => [
            'management' => 'Заказы',
        ],
        'access' => [
            'roles' => [
                'create' => 'Создать новую роль',
                'edit' => 'Изменить роль',
                'management' => 'Доступ',
                'table' => [
                    'number_of_users' => 'Пользователей',
                    'permissions' => 'Разрешения',
                    'role' => 'Роль',
                    'sort' => 'Позиция',
                    'total' => 'ролей всего|всего ролей',
                ],
            ],
            'page' => [
                'create' => 'Создать страницу',
                'edit' => 'Изменить страницу',
                'management' => 'Страницы',
                'table' => [
                    'id' => '№',
                    'pageKey' => 'Ключ страницы',
                    'title' => 'Заголовок',
                    'created_at' => 'Дата создания'
                ],
            ],
            'block' => [
                'create' => 'Создать блок',
                'edit' => 'Изменить блок',
                'management' => 'Блоки',
                'table' => [
                    'id' => '№',
                    'title' => 'Заголовок',
                    'image' => 'Имя изображения',
                    'created_at' => 'Дата создания'
                ],
            ],
            'news' => [
                'create' => 'Создать новость',
                'edit' => 'Изменить новость',
                'management' => 'Новости',
                'table' => [
                    'id' => '№',
                    'title' => 'Заголовок',
                    'type' => 'Тип',
                    'image' => 'Имя изображения',
                    'created_at' => 'Дата создания'
                ],
            ],
            'category' => [
                'create' => 'Создать категорию',
                'edit' => 'Изменить категорию',
                'delete' => 'Удалить категорию',
                'management' => 'Категории'
            ],
            'collection' => [
                'create' => 'Создать коллекцию',
                'edit' => 'Изменить коллекцию',
                'management' => 'Коллекции',
                'table' => [
                    'id' => '№',
                    'title' => 'Заголовок',
                    'image' => 'Имя изображения',
                    'banner' => 'Баннер',
                    'created_at' => 'Дата создания'
                ],
            ],
            'marker' => [
                'create' => 'Создать маркер',
                'edit' => 'Изменить маркер',
                'delete' => 'Удалить маркер',
                'management' => 'Управление маркерами',
            ],
            'faq' => [
                'create' => 'Создать вопрос',
                'edit' => 'Изменить вопрос',
                'management' => 'Вопросы',
                'table' => [
                    'id' => '№',
                    'question' => 'Вопрос',
                    'answer' => 'Ответ',
                    'created_at' => 'Дата создания'
                ],
            ],
            'zone' => [
                'create' => 'Создать зону',
                'edit' => 'Изменить зону',
                'management' => 'Зоны',
                'table' => [
                    'id' => '№',
                    'title' => 'Заголовок',
                    'image' => 'Имя изображения',
                    'created_at' => 'Дата создания'
                ],
            ],
            'product' => [
                'create' => 'Создать товар',
                'edit' => 'Изменить товар',
                'management' => 'Товары',
                'table' => [
                    'id' => '№',
                    'name' => 'Название',
                    'created_at' => 'Дата создания'
                ],
            ],
            'showroom' => [
                'create' => 'Создать посредника',
                'edit' => 'Изменить посредника',
                'management' => 'Посредники',
                'table' => [
                    'id' => '№',
                    'country' => 'Страна',
                    'city' => 'Город',
                    'name' => 'Название'
                ],
            ],
            'finishtissue' => [
                'create' => 'Создать ткань',
                'edit' => 'Изменить ткань',
                'management' => 'Ткани',
                'table' => [
                    'id' => '№',
                    'title' => 'Название',
                    'short' => 'Короткое имя'
                ],
            ],
            'popup' => [
                'edit' => 'Изменить объявление',
                'management' => 'Управление объявлением'
            ],
            'message' => [
                'show' => 'Показать сообщение',
                'management' => 'Все сообщения',
                'from' => 'От',
                'date' => 'Дата',

                'table' => [
                    'name' => 'Имя',
                    'email' => 'Email',
                    'new' => 'Новое',
                    'created_at' => 'Отправлено'
                ]
            ],
            'users' => [
                'active' => 'Активные пользователи',
                'all_permissions' => 'Полный доступ',
                'change_password' => 'Изменение пароля',
                'change_password_for' => 'Изменить пароль :user',
                'create' => 'Создать учётную запись',
                'deactivated' => 'Заблокированные пользователи',
                'deleted' => 'Удаленные пользователи',
                'edit' => 'Редактирование учётной записи',
                'management' => 'Пользователи',
                'no_permissions' => 'Нет разрешений',
                'no_roles' => 'Невозможно присвоить роль.',
                'permissions' => 'Разрешения',
                'table' => [
                    'confirmed' => 'Подтверждён',
                    'created' => 'Создан',
                    'email' => 'E-mail',
                    'id' => 'ID',
                    'last_updated' => 'Обновлён',
                    'name' => 'Логин',
                    'no_deactivated' => 'Нет заблокированных пользователей',
                    'no_deleted' => 'Нет удаленных пользователей',
                    'roles' => 'Роль',
                    'total' => 'пользователей всего|всего пользователей',
                ],
                'tabs' => [
                    'content' => [
                        'overview' => [
                            'avatar' => 'Аватар',
                            'confirmed' => 'Подтверждён',
                            'created_at' => 'Создан',
                            'deleted_at' => 'Удалён',
                            'email' => 'E-mail',
                            'last_updated' => 'Обновлён',
                            'name' => 'Логин',
                            'status' => 'Статус',
                        ],
                    ],
                    'titles' => [
                        'history' => 'История',
                        'overview' => 'Обзор',
                    ],
                ],
                'view' => 'Просмотр учётной записи',
            ],
        ],
    ],
    'frontend' => [
        'auth' => [
            'login_box_title' => 'Вход',
            'login_button' => 'Вход',
            'login_with' => 'Вход из :social_media',
            'register_box_title' => 'Регистрация',
            'register_button' => 'Зарегистрироваться',
            'remember_me' => 'Запомнить меня',
        ],
        'macros' => [
            'country' => [
                'alpha' => 'Альфа коды стран',
                'alpha2' => 'Альфа-2 коды стран',
                'alpha3' => 'Альфа-3 коды стран',
                'numeric' => 'Country Numeric Codes',
            ],
            'macro_examples' => 'Примеры макросов',
            'state' => [
                'mexico' => 'Список штатов Мексики',
                'us' => [
                    'armed' => 'US Armed Forces',
                    'outlying' => 'Окружающие территории США',
                    'us' => 'Штаты США',
                ],
            ],
            'territories' => [
                'canada' => 'Провинции Канады & Территории',
            ],
            'timezone' => 'Часовые пояса',
        ],
        'passwords' => [
            'forgot_password' => 'Забыли Пароль?',
            'reset_password_box_title' => 'Сброс Пароля',
            'reset_password_button' => 'Смена пароля',
            'send_password_reset_link_button' => 'Отправить ссылку для смены пароля',
        ],
        'user' => [
            'passwords' => [
                'change' => 'Изменить пароль',
            ],
            'profile' => [
                'avatar' => 'Аватар',
                'created_at' => 'Создан',
                'edit_information' => 'Редактирование информации',
                'email' => 'E-mail',
                'last_updated' => 'Обновлён',
                'name' => 'Логин',
                'update_information' => 'Обновление информации',
            ],
        ],
    ],
    'general' => [
        'actions' => 'Действие',
        'active' => 'Активирован',
        'all' => 'Все',
        'buttons' => [
            'save' => 'Сохранить',
            'update' => 'Обновить',
        ],
        'custom' => 'Выборочно',
        'hide' => 'Скрыть',
        'inactive' => 'Неактивен',
        'no' => 'Нет',
        'none' => 'Нет',
        'show' => 'Показать',
        'toggle_navigation' => 'Навигация',
        'yes' => 'Да',
    ],
];
