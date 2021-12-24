<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // password
            'role' => 'user',
            'remember_token' => Str::random(10),
        ];
    }
        /**
     * Состояние для учетной записи администратора
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'admin',
                'email' => 'admin@test.ru',
                'role' => 'admin',
            ];
        });
    }
    public function user()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'user',
                'email' => 'user@test.ru',
                'role' => 'user',
            ];
        });
    }
}