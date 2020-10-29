<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Page;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->word,
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->text,
            'content' => $this->faker->paragraphs(3, true),
            'category_id' => Category::factory(),
        ];
    }
}
