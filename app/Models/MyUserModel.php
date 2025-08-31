<?php

namespace App\Models;

use Myth\Auth\Models\UserModel;

class MyUserModel extends UserModel
{
    protected $allowedFields = [
        'email', 'username', 'fullname', 'password_hash',
        'active', 'reset_hash', 'reset_at', 'reset_expires',
        'activate_hash', 'status', 'status_message',
        'secret', 'force_pass_reset', 'permissions',
        'deleted_at',
        // field tambahan
        'bio', 'user_image'
    ];
}
