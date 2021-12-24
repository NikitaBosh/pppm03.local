<?php

namespace App\Policies;

use App\Models\Mediateka;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MediatekaPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        // проверяем является ли пользователь администратором
        $isAdmin = $user->role == 'admin';

        // возвращаем результат проверки
        return $isAdmin;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mediateka  $mediateka
     * @return mixed
     */
    public function update(User $user, Mediateka $mediateka)
    {
        // проверяем является ли пользователь администратором
        $isAdmin = $user->role == 'admin';

        // возвращаем результат проверки
        return $isAdmin;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mediateka  $mediateka
     * @return mixed
     */
    public function delete(User $user, Mediateka $mediateka)
    {
        // проверяем является ли пользователь администратором
        $isAdmin = $user->role == 'admin';

        // возвращаем результат проверки
        return $isAdmin;
    }
}
