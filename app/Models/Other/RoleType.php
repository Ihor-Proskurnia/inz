<?php

declare(strict_types=1);

namespace App\Models\Other;

class RoleType
{
    /**
     * Admin.
     */
    public const ADMIN = 'ADMIN';

    /**
     * Trainer.
     */
    public const TRAINER = 'TRAINER';

    /**
     * Sportsman.
     */
    public const SPORTSMAN = 'SPORTSMAN';



    /**
     * Get all available company role types.
     *
     * @return array
     */
    public static function all()
    {
        return [
            self::ADMIN,
            self::TRAINER,
            self::SPORTSMAN,
        ];
    }
}
