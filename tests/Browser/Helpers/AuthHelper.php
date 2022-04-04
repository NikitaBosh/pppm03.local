<?php

namespace Tests\Browser\Helpers;

use App\Models\User;

class AuthHelper
{
    public static function getUserWithRole(string $roleName) : User
    {
        $user = User::where('role', $roleName)->first();
        if($user === null)
        {
            if($roleName == 'admin')
            {
                $user = User::factory()
                    ->count(1)
                    ->training()
                    ->create();
            }
            else if($roleName == 'user')
            {
                $user = User::factory()
                    ->count(1)
                    ->teacher()
                    ->create();
            }
        }
        return $user;
    }
}