<?php

namespace Database\Factories\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_type' => null,
            'slug' => $this->faker->slug(),
            'sku' => Str::random(10),
            'product_image' => 'https://decizia.com/blog/wp-content/uploads/2017/06/default-placeholder.png',
            'product_details_id' => 1,
            'unit_id' => 1,
            'price' => $this->faker->randomDigit(),
            'discount_price' => null,
            'product_categories_id' => 1,
            'status' => 'unpublished',
            'shop_id' => 3,
            'tax_id' => 1,
            'product_views' => 1,
            'is_featured' => 1,
        ];
    }
}
