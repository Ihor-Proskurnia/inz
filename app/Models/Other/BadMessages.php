<?php

declare(strict_types=1);

namespace App\Models\Other;

class BadMessages
{
    // User
    public const REGISTER_USER_ERROR = 'Register user error.';
    public const LOGIN_USER_ERROR = 'Login user error.';
    public const HAS_NO_ACCESS = 'Has no access to content.';
    public const REMOVE_USER_ERROR = 'Error remove user.';
    public const ACTIVATE_USER_ERROR = 'Error activate user.';

    // Auth
    public const INVALID_USER_CREDENTIALS = 'User credentials invalid.';
    public const PASSWORD_USER_NOT_CHANGED = 'Password not changed.';
}
