<?php

namespace Tests\Smoke\entry\App\Http\Controllers\User\ShowUsers;

use App\Models\Other\RoleType;

trait ShowUsersTrait
{
    public function goodRoles()
    {
        return [
            'admin' => [
                RoleType::ADMIN,
            ],
            'moderator' => [
                RoleType::MODERATOR,
            ],
        ];
    }

    public function wrongRoles()
    {
        return [
            'admin' => [
                RoleType::DRIVER,
            ],
            'moderator' => [
                RoleType::STORAGE_WORKER,
            ],
        ];
    }

}
