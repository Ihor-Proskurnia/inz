<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Other\RoleType;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function showUsers(User $user)
    {
        return $user->isAn(RoleType::ADMIN);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function show(User $user)
    {
        return $user->isAn(RoleType::ADMIN);
    }

//    /**
//     * Determine whether the user can create models.
//     *
//     * @param  \App\Models\User  $user
//     * @return \Illuminate\Auth\Access\Response|bool
//     */
//    public function create(User $user)
//    {
//        return $user->isAn(RoleType::ADMIN);
//    }

//    /**
//     * Determine whether the user can update the model.
//     *
//     * @param  \App\Models\User  $user
//     * @return \Illuminate\Auth\Access\Response|bool
//     */
//    public function update(User $user)
//    {
//        return $user->isA(RoleType::ADMIN);
//    }

//    /**
//     * Determine whether the user can delete the model.
//     *
//     * @param  \App\Models\User  $user
//     * @return \Illuminate\Auth\Access\Response|bool
//     */
//    public function delete(User $user)
//    {
//        return $user->isAn(RoleType::ADMIN);
//    }
}
