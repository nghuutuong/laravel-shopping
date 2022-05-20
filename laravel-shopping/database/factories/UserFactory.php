<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        [
            'admin_name' => $this->faker->name,
            'admin_email' => $this->faker->unique()->safeEmail,
            'admin_phone' => $this->faker->name,
            'admin_password' => '123456', // password
        ];
    }
}
