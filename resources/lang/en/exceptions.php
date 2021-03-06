<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Exception Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in Exceptions thrown throughout the system.
    | Regardless where it is placed, a button can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'roles' => [
                'already_exists' => 'That role already exists. Please choose a different name.',
                'cant_delete_admin' => 'You can not delete the Administrator role.',
                'create_error' => 'There was a problem creating this role. Please try again.',
                'delete_error' => 'There was a problem deleting this role. Please try again.',
                'has_users' => 'You can not delete a role with associated users.',
                'needs_permission' => 'You must select at least one permission for this role.',
                'not_found' => 'That role does not exist.',
                'update_error' => 'There was a problem updating this role. Please try again.',
            ],
            'faq' => [
                'create_error' => 'There was a problem creating this question. Please try again.',
                'delete_error' => 'There was a problem deleting this question. Please try again.',
                'update_error' => 'There was a problem updating this question. Please try again.',
            ],
            'news' => [
                'create_error' => 'There was a problem creating this news. Please try again.',
                'delete_error' => 'There was a problem deleting this news. Please try again.',
                'update_error' => 'There was a problem updating this news. Please try again.',
            ],
            'page' => [
                'create_error' => 'There was a problem creating this page. Please try again.',
                'delete_error' => 'There was a problem deleting this page. Please try again.',
                'update_error' => 'There was a problem updating this page. Please try again.',
            ],
            'block' => [
                'create_error' => 'There was a problem creating this block. Please try again.',
                'delete_error' => 'There was a problem deleting this block. Please try again.',
                'update_error' => 'There was a problem updating this block. Please try again.',
            ],
            'category' => [
                'create_error' => 'There was a problem creating this category. Please try again.',
                'delete_error' => 'There was a problem deleting this category. Please try again.',
                'update_error' => 'There was a problem updating this category. Please try again.',
                'delete_with_children' => 'This category have children categories. Please delete them first.',
                'create_depth' => 'Depth cannot be grater than 1.',

            ],
            'collection' => [
                'create_error' => 'There was a problem creating this collection. Please try again.',
                'delete_error' => 'There was a problem deleting this collection. Please try again.',
                'update_error' => 'There was a problem updating this collection. Please try again.',
            ],
            'zone' => [
                'create_error' => 'There was a problem creating this zone. Please try again.',
                'delete_error' => 'There was a problem deleting this zone. Please try again.',
                'update_error' => 'There was a problem updating this zone. Please try again.',
            ],
            'good' => [
                'create_error' => 'There was a problem creating this goods. Please try again.',
                'delete_error' => 'There was a problem deleting this goods. Please try again.',
                'update_error' => 'There was a problem updating this goods. Please try again.',
            ],
            'showroom' => [
                'create_error' => 'There was a problem creating this dealers. Please try again.',
                'delete_error' => 'There was a problem deleting this dealers. Please try again.',
                'update_error' => 'There was a problem updating this dealers. Please try again.',
            ],
            'finishtissue' => [
                'create_error' => 'There was a problem creating this tissues. Please try again.',
                'delete_error' => 'There was a problem deleting this tissues. Please try again.',
                'delete_with_child_error' => 'This finish/tissue have children. Please delete them first.',
                'update_error' => 'There was a problem updating this tissues. Please try again.',
            ],
            'popup' => [
                'update_error' => 'There was a problem updating this popup. Please try again.'
            ],
            'settings' => [
                'update_error' => 'There was a problem updating settings. Please try again.',
            ],
            'orders' => [
                'update_error' => 'There was a problem updating order\'s status. Please try again.',
            ],

            'templateMessage' => [
                'create_error' => 'There was a problem creating this template message. Please try again.',
                'delete_error' => 'There was a problem deleting this template message. Please try again.',
                'update_error' => 'There was a problem updating this template message. Please try again.',
            ],
            'documents' => [
                'create_error' => 'There was a problem creating this document. Please try again.',
                'delete_error' => 'There was a problem deleting this document. Please try again.',
                'update_error' => 'There was a problem updating this document. Please try again.',
            ],
            'users' => [
                'cant_deactivate_self' => 'You can not do that to yourself.',
                'cant_delete_admin' => 'You can not delete the super administrator.',
                'cant_delete_self' => 'You can not delete yourself.',
                'cant_delete_own_session' => 'You can not delete your own session.',
                'cant_restore' => 'This user is not deleted so it can not be restored.',
                'create_error' => 'There was a problem creating this user. Please try again.',
                'delete_error' => 'There was a problem deleting this user. Please try again.',
                'delete_first' => 'This user must be deleted first before it can be destroyed permanently.',
                'email_error' => 'That email address belongs to a different user.',
                'mark_error' => 'There was a problem updating this user. Please try again.',
                'not_found' => 'That user does not exist.',
                'restore_error' => 'There was a problem restoring this user. Please try again.',
                'role_needed_create' => 'You must choose at lease one role.',
                'role_needed' => 'You must choose at least one role.',
                'session_wrong_driver' => 'Your session driver must be set to database to use this feature.',
                'update_error' => 'There was a problem updating this user. Please try again.',
                'update_password_error' => 'There was a problem changing this users password. Please try again.',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Your account is already confirmed.',
                'confirm' => 'Confirm your account!',
                'created_confirm' => 'Your account was successfully created. We have sent you an e-mail to confirm your account.',
                'mismatch' => 'Your confirmation code does not match.',
                'not_found' => 'That confirmation code does not exist.',
                'resend' => 'Your account is not confirmed. Please click the confirmation link in your e-mail, or <a href="' . route('frontend.auth.account.confirm.resend', ':user_id') . '">click here</a> to resend the confirmation e-mail.',
                'success' => 'Your account has been successfully confirmed!',
                'resent' => 'A new confirmation e-mail has been sent to the address on file.',
            ],

            'deactivated' => 'Your account has been deactivated.',
            'email_taken' => 'That e-mail address is already taken.',

            'password' => [
                'change_mismatch' => 'That is not your old password.',
                'reset_problem' => 'There was a problem resetting your password. Please resend the password reset email.',
            ],

            'registration_disabled' => 'Registration is currently closed.',
        ],
    ],
];
