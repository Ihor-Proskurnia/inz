<?php

namespace Tests\Smoke\Controllers\Auth\Login;

trait LoginTrait
{
    public function createCredentials($email = 'email@example.com', $password = 'password')
    {
        return [
            'email' => $email,
            'password' => $password,
        ];
    }

    public function wrongCredentials()
    {
        return [
            'email_is_not_email' => [
                [
                    'email' => 'not_email',
                    'password' => "Password1",
                ],
            ],
            'email_is_empty' => [
                [
                    'email' => '',
                    'password' => "Password1",
                ],
            ],
            'email_is_not_exists' => [
                [
                    'password' => "Password1",
                ],
            ],
            'email_is_not_null' => [
                [
                    'email' => null,
                    'password' => "Password1",
                ],
            ],
            'password_is_empty' => [
                [
                    'email' => 'email@email.com',
                    'password' => '',
                ],
            ],
            'password_is_null' => [
                [
                    'email' => 'email@email.com',
                    'password' => null,
                ],
            ],
            'password_is_not_exists' => [
                [
                    'email' => 'email@email.com',
                ],
            ],
        ];
    }
}
