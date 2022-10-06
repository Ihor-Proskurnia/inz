<?php

namespace Tests\Smoke\Controllers\User\ShowUsers;


trait ShowUsersTrait
{
    public function goodRoles()
    {
        return [
            'admin' => [
//                RoleType::ADMIN,
            ],
            'moderator' => [
//                RoleType::MODERATOR,
            ],
        ];
    }

    public function wrongRoles()
    {
        return [
            'admin' => [
//                RoleType::DRIVER,
            ],
            'moderator' => [
//                RoleType::STORAGE_WORKER,
            ],
        ];
    }

}
