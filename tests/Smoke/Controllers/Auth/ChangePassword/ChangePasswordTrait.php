<?php

namespace Tests\Smoke\Controllers\Auth\ChangePassword;

trait ChangePasswordTrait
{
    public function createCredentials($old_password, $password, $password_confirmed)
    {
        return [
            'old_password' => $old_password,
            'password' => $password,
            'password_confirmation' => $password_confirmed,
        ];
    }

    public function badRequests403()
    {
        return [
            'empty' => [
                [],
            ],
            'null' => [
                [null],
            ],
            'old password is not set' => [
                [
                    'password' => 'Password1',
                    'password_confirmation' => 'Password1',
                ],
            ],
            'wrong old password' => [
                [
                    'old_password' => 'wrongPassword',
                    'password' => 'Password1',
                    'password_confirmation' => 'Password1',
                ],
            ],
        ];
    }
}
