<?php

namespace Database\Factories;

use App\Models\Bookmarks;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookmarksFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bookmarks::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText($this->faker->numberBetween(10,25)),
            'url' => $this->faker->url(),
            'description' => $this->faker->realText($this->faker->numberBetween(50,200))
        ];
    }
}
