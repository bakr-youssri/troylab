<?php

namespace Database\Factories;

use App\Helpers\IDGenerator;
use App\Models\School;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

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
            'mob' => $this->faker->unique()->phoneNumber(),
            'level' => $this->faker->randomElement(['one' , 'two', 'three']),
            'dob' => $this->faker->date,
            'gender' => $this->faker->randomElement(['male' , 'female']),
            'enabled'=> rand(0,1),
            'school_id' => $this->faker->numberBetween(1, School::count()),
        ];
    }
}
