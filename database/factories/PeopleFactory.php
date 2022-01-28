<?php

namespace Database\Factories;

use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PeopleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'creator_id' => User::factory()->create()->id,
            'name' => $this->faker->name,
            'surname' => $this->faker->name,
            'south_african_id_number' => Str::random(),
            'mobile_number' => $this->faker->phoneNumber,
            'birth_date' => $this->faker->date,
            'email' => $this->faker->email,
            'language_id' => Language::factory()->create()->id,
        ];
    }
}
