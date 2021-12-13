<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Stationery;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Employee::create([
            'full_name' => 'Nguyễn Văn A',
            'phone_number' => '0354621452',
            'email' => 'anv@gmail.com',
            'address' => 'somewhere',
            'salary' => '800000',
            'user_id' => \App\Models\User::create([
                'username' => 'test',
                'password' => '123456',
                'role' => '1'
            ])->id
        ]);

        $books = Book::factory(10)->create();

        foreach ($books as $book)
        {
            // $product = Product::factory()->create();

            $book->product()->create([
                'name' => 'Test '.$book->id,
                // 'product_type_id' => ProductType::factory()->create()->id,
                'brand_id' => Brand::factory()->create()->id,
                'version' => '100',
            ]);

            // $product = Product::factory()->create();
            // $book->product()->create(compact('product'));
        }

        $stationeries = Stationery::factory(10)->create();

        foreach ($stationeries as $stationery)
        {
            // $product = Product::factory()->create();

            $stationery->product()->create([
                'name' => 'Test '.$stationery->id,
                // 'product_type_id' => ProductType::factory()->create()->id,
                'brand_id' => Brand::factory()->create()->id,
                'version' => '100',
            ]);

            // $product = Product::factory()->create();
            // $book->product()->create(compact('product'));
        }

        // Product::factory(20)->create();
    }
}
