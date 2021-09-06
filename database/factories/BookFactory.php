<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->realText(rand(10,20)),//faker name
            'author' => $this->faker->name(10,20),//faker author
            'publish_date' => $this->faker->year($max = 'now'),//faker publish year
            'category_id' => $this->faker->numberBetween($min = 1, $max = 12),//random category
            'available' => $this->faker->boolean(),//status borrowed or available
        ];
    }
}
