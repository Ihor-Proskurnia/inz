<?php

namespace App\Models\Traits;
use Illuminate\Support\Str;
use Laravel\Sanctum\Sanctum;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\NewAccessToken;

trait HasCustomApiTokens
{
    use HasApiTokens;

    /**
     * Create a new personal access token for the user.
     *
     * @param  string  $name
     * @param  array  $abilities
     * @return \Laravel\Sanctum\NewAccessToken
     */
    public function createToken(string $name, bool $is_mobile, array $abilities = ['*'])
    {
        $token = $this->tokens()->create([
            'name' => $name,
            'is_mobile' => $is_mobile,
            'token' => hash('sha256', $plainTextToken = Str::random(40)),
            'abilities' => $abilities,
        ]);

        return new NewAccessToken($token, $token->getKey().'|'.$plainTextToken);
    }

    /**
     * Get the access tokens that belong to model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function notMobileTokens()
    {
        return $this->morphMany(Sanctum::$personalAccessTokenModel, 'tokenable')
            ->where('is_mobile', false);
    }
}
