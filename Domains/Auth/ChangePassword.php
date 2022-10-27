<?php

declare(strict_types=1);

namespace Auth;

use App\Models\User;
use Auth\Contracts\IChangePassword;
use Illuminate\Support\Facades\Hash;
use UseCases\Contracts\Requests\Auth\IChangeRequest;

class ChangePassword implements IChangePassword
{
    /**
     * @var Hash
     */
    public $hash;

    /**
     * @param Hash $hash
     */
    public function __construct(Hash $hash)
    {
        $this->hash = $hash;
    }

    public function changePassword(IChangeRequest $request, User $user): void
    {
        $user->forceFill([
            'password' => $this->hash::make($request->getUserPassword()),
        ])->update();
    }
}
