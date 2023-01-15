<?php

declare(strict_types=1);

namespace App\Models;

class ResponseMessages
{
    public const NOT_FOUND = 'Not Found';

    // User
    public const REGISTERED = 'Account created';
    public const USER_WAS_ACTIVATED = 'Your account was successfully activated';
    public const NOT_VERIFIED_USER = 'Your email address is not verified.';
    public const FORGOT = 'Check your email';
    public const WRONG_CREDENTIALS = 'Wrong credentials';
    public const CHANGED_PASSWORD = 'Password changed';
    public const REMOVE_YOURSELF = 'Remove yourself from company is not a good idea';
    public const SUCCESS_REMOVE_USER = 'User was removed';
    public const SUCCESS_ACTIVATE_USER = 'User was activated';

    public const SUCCESS_REMOVE_ORDER = 'Order was removed';

    public const SUCCESS_REMOVE_RECORD = 'Record was removed';
}
