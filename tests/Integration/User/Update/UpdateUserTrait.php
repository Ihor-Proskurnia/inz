<?php

namespace Tests\Integration\UseCase\User\Update;

use App\Models\Other\RoleType;
use App\Http\Requests\User\UpdateUserRequest;

trait UpdateUserTrait
{
    public function createCredentials()
    {
        $request_data = [
            'name' => 'Some',
            'surname' => 'Name',
            'roles' => [RoleType::DRIVER, RoleType::MODERATOR],
            'phone' => '81500000',
            'post_code' => '0010',
            'city' => 'Oslo',
            'street' => 'street',
            'bank_account' => '1234567890',
            'social_security'=> '0000000000',
            'salary_per_hour' => '26.50',
        ];

        return new UpdateUserRequest($request_data);
    }
}
