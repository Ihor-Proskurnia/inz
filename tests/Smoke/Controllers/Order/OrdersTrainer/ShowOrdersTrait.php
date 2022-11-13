<?php

namespace Tests\Smoke\Controllers\Order\OrdersTrainer;

use App\Models\Other\RoleType;

trait ShowOrdersTrait
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
