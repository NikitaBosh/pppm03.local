<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // создаем администратора
        User::factory()
            ->count(1)
            ->admin()
            ->create();
        // создаем пользователя
        User::factory()
            ->count(1)
            ->user()
            ->create();
    }
}