<?php

namespace Tests\Smoke\Controllers\User\ShowUsers;


use App\Models\Other\RoleType;

trait ShowUsersTrait
{
    public function goodRoles()
    {
        return [
            'admin' => [
                RoleType::ADMIN,
            ],
        ];
    }

    public function wrongRoles()
    {
        return [
            'trainer' => [
                RoleType::TRAINER,
            ],
            'sportsman' => [
                RoleType::SPORTSMAN,
            ],
        ];
    }

}
