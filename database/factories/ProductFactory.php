<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Brand;
use App\Models\Stationery;
use App\Models\ProductType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $productable = [
        //     Book::class,
        //     Stationery::class
        // ];
        // $productable_type = $this->faker->randomElement($productable);
        // $productable = $this->factoryForModel($productable_type)->create();

        // return [
        //     'name' => $this->faker->words(),
        //     'product_type_id' => ProductType::factory()->create()->id,
        //     'brand_id' => Brand::factory()->create()->id,
        //     'version' => $this->faker->randomNumber(),
        //     // 'price' => $this->faker->numberBetween(1000, 500000),
        //     'productable_id' => $productable->id,
        //     'productable_type' => $productable_type
        // ];

        return [
            'name' => $this->faker->words(),
            'product_type_id' => ProductType::factory()->create()->id,
            'brand_id' => Brand::factory()->create()->id,
            'version' => $this->faker->randomNumber(),
        ];
    }
}
