<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class GoodsReceiptDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $quantity = rand(1, 100);
        $cost = rand(0, 100) * 1000;

        return [
            'product_id' => Product::all()->random()->id,
            'quantity' => $quantity,
            'cost' => $cost,
            'total' => $quantity * $cost
        ];
    }
}
