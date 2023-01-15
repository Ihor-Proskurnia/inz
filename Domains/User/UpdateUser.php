<?php

namespace User;

use User\Entities\User;
use User\Contracts\IUpdateUser;
use App\Models\User as DomainUser;
use UseCases\Contracts\User\Entities\IUser;
use UseCases\Contracts\Requests\User\IUpdateUserRequest;

class UpdateUser implements IUpdateUser
{
    public User $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function update(IUpdateUserRequest $data_provider, int $user_id): IUser
    {
        $domain_user = $this->user->newModelQuery()->getUser($user_id);

        $domain_user->update([
            'name' => $data_provider->getUsername(),
            'city' => $data_provider->getCity(),
            'phone' => $data_provider->getPhone(),
            'description' => $data_provider->getDescription(),
        ]);

        return $domain_user;
    }
}
