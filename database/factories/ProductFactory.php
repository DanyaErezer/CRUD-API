<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(3);
        return [
            'title' => $title,
            'slug' => Str::slug($title . '-' . $this->faker->unique()->numberBetween(1, 500)),
            'description' => $this->faker->optional()->paragraph(),
            'category_id' => ProductCategory::factory()
        ];
    }
}
