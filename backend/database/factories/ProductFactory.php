<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => ucfirst($this->faker->words(2, true)),
            'description' => ucfirst($this->faker->words(6, true)),
            'content' => ucfirst($this->faker->text),
            'price' => $this->faker->numberBetween(20, 1200),
            'count' => $this->faker->numberBetween(0, 400),
            'is_published' => $this->faker->boolean,
            'category_id' => Category::query()->inRandomOrder()->first()->value('id'),
            'preview_image' => $this->faker->imageUrl(1000, 1200, null, false),
        ];
    }
}
