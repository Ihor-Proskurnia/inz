<?php

namespace Tests\Smoke\Controllers\Category\ShowCategories;


trait ShowCategoriesTrait
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
