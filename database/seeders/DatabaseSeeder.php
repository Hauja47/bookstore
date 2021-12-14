<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Provider;
use App\Models\Stationery;
use App\Models\PaymentType;
use App\Models\ProductType;
use App\Models\ReceiptType;
use App\Models\PaymentMethod;
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

        ReceiptType::factory(10)->create();
        PaymentType::factory(10)->create();
        PaymentMethod::factory(10)->create();
        Brand::factory(15)->create();

        $customers = Customer::factory(10)->create();
        $employees = Employee::factory(10)->create();
        $providers = Provider::factory(10)->create();

        foreach ($customers as $customer)
        {
            $customer->payments()->create([
                'payment_type_id' => PaymentType::all()->random()->id,
                'payment_method_id' => PaymentMethod::all()->random()->id,
                'employee_id' => Employee::all()->random()->id,
                'money' => rand(0, 100) * 1000,
                'note' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde nihil quo quidem aperiam, praesentium minima numquam excepturi tempore debitis vel esse hic incidunt laborum mollitia illum quod cupiditate. Provident, natus!'
            ]);

            $customer->receipts()->create([
                'receipt_type_id' => ReceiptType::all()->random()->id,
                'payment_method_id' => PaymentMethod::all()->random()->id,
                'employee_id' => Employee::all()->random()->id,
                'money' => rand(0, 100) * 1000,
                'note' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde nihil quo quidem aperiam, praesentium minima numquam excepturi tempore debitis vel esse hic incidunt laborum mollitia illum quod cupiditate. Provident, natus!',
            ]);
        }

        foreach ($employees as $employee)
        {
            $employee->paymentReceiver()->create([
                'payment_type_id' => PaymentType::all()->random()->id,
                'payment_method_id' => PaymentMethod::all()->random()->id,
                'employee_id' => Employee::all()->random()->id,
                'money' => rand(0, 100) * 1000,
                'note' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde nihil quo quidem aperiam, praesentium minima numquam excepturi tempore debitis vel esse hic incidunt laborum mollitia illum quod cupiditate. Provident, natus!'
            ]);

            $employee->receiptGiver()->create([
                'receipt_type_id' => PaymentType::all()->random()->id,
                'payment_method_id' => PaymentMethod::all()->random()->id,
                'employee_id' => Employee::all()->random()->id,
                'money' => rand(0, 100) * 1000,
                'note' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde nihil quo quidem aperiam, praesentium minima numquam excepturi tempore debitis vel esse hic incidunt laborum mollitia illum quod cupiditate. Provident, natus!'
            ]);
        }

        foreach ($providers as $provider)
        {
            $provider->payments()->create([
                'payment_type_id' => PaymentType::all()->random()->id,
                'payment_method_id' => PaymentMethod::all()->random()->id,
                'employee_id' => Employee::all()->random()->id,
                'money' => rand(0, 100) * 1000,
                'note' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde nihil quo quidem aperiam, praesentium minima numquam excepturi tempore debitis vel esse hic incidunt laborum mollitia illum quod cupiditate. Provident, natus!'
            ]);

            $provider->receipts()->create([
                'receipt_type_id' => ReceiptType::all()->random()->id,
                'payment_method_id' => PaymentMethod::all()->random()->id,
                'employee_id' => Employee::all()->random()->id,
                'money' => rand(0, 100) * 1000,
                'note' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde nihil quo quidem aperiam, praesentium minima numquam excepturi tempore debitis vel esse hic incidunt laborum mollitia illum quod cupiditate. Provident, natus!',
            ]);
        }

        $books = Book::factory(10)->create();

        foreach ($books as $book)
        {
            $book->product()->create([
                'name' => 'Test '.$book->id,
                'brand_id' => Brand::all()->random()->id,
                'version' => '100',
            ]);
        }

        $stationeries = Stationery::factory(10)->create();

        foreach ($stationeries as $stationery)
        {
            $stationery->product()->create([
                'name' => 'Test '.$stationery->id,
                'brand_id' => Brand::all()->random()->id,
                'version' => '100',
            ]);
        }
    }
}
