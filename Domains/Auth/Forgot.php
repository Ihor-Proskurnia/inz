<?php

declare(strict_types=1);

namespace Auth;

use Str;
use App\Models\User;
use Auth\Contracts\IForgot;
use Illuminate\Support\Facades\Hash;
use UseCases\Contracts\Requests\Auth\IForgotRequest;

class Forgot implements IForgot
{
    /**
     * @var User
     */
    public User $user_model;
    /**
     * @var Hash
     */
    public $hash;
    /**
     * @var Str
     */
    public Str $str;

    /**
     * @param User $user_model
     * @param Hash $hash
     */
    public function __construct(User $user_model, Hash $hash, Str $str)
    {
        $this->user_model = $user_model;
        $this->hash = $hash;
        $this->str = $str;
    }

    public function forgot(IForgotRequest $request)
    {
        $user = $this->user_model->findByEmail($request->getEmail());
        $password = $this->str::random(10);

        $user->forceFill([
            'password' => $this->hash::make($password),
        ])->save();

        $user->password = $password;

        return $user;
    }
}
