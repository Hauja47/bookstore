<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\GoodsReceipt;
use App\Models\GoodsReceiptDetail;
use App\Models\Invoice;
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

        // ReceiptType::factory(10)->create();
        // PaymentType::factory(10)->create();
        // PaymentMethod::factory(10)->create();
        Brand::factory(15)->create();

        $customers = Customer::factory(10)->create();
        $employees = Employee::factory(10)->create();
        $providers = Provider::factory(10)->create();

        // foreach ($customers as $customer)
        // {
        //     $customer->payments()->create([
        //         // 'payment_type_id' => PaymentType::all()->random()->id,
        //         // 'payment_method_id' => PaymentMethod::all()->random()->id,
        //         'employee_id' => Employee::all()->random()->id,
        //         'money' => rand(0, 100) * 1000,
        //         'note' => 'Lorem, ipsum dolor.'
        //     ]);

        //     $customer->receipts()->create([
        //         // 'receipt_type_id' => ReceiptType::all()->random()->id,
        //         // 'payment_method_id' => PaymentMethod::all()->random()->id,
        //         'employee_id' => Employee::all()->random()->id,
        //         'money' => rand(0, 100) * 1000,
        //         'note' => 'Lorem, ipsum dolor.',
        //     ]);
        // }

        // foreach ($employees as $employee)
        // {
        //     $employee->paymentReceiver()->create([
        //         // 'payment_type_id' => PaymentType::all()->random()->id,
        //         // 'payment_method_id' => PaymentMethod::all()->random()->id,
        //         'employee_id' => Employee::all()->random()->id,
        //         'money' => rand(0, 100) * 1000,
        //         'note' => 'Lorem, ipsum dolor.'
        //     ]);

        //     $employee->receiptGiver()->create([
        //         // 'receipt_type_id' => PaymentType::all()->random()->id,
        //         // 'payment_method_id' => PaymentMethod::all()->random()->id,
        //         'employee_id' => Employee::all()->random()->id,
        //         'money' => rand(0, 100) * 1000,
        //         'note' => 'Lorem, ipsum dolor.'
        //     ]);
        // }

        // foreach ($providers as $provider)
        // {
        //     $provider->payments()->create([
        //         // 'payment_type_id' => PaymentType::all()->random()->id,
        //         // 'payment_method_id' => PaymentMethod::all()->random()->id,
        //         'employee_id' => Employee::all()->random()->id,
        //         'money' => rand(0, 100) * 1000,
        //         'note' => 'Lorem, ipsum dolor.'
        //     ]);

        //     $provider->receipts()->create([
        //         // 'receipt_type_id' => ReceiptType::all()->random()->id,
        //         // 'payment_method_id' => PaymentMethod::all()->random()->id,
        //         'employee_id' => Employee::all()->random()->id,
        //         'money' => rand(0, 100) * 1000,
        //         'note' => 'Lorem, ipsum dolor.',
        //     ]);
        // }

        $books = Book::factory(10)->create();

        foreach ($books as $book)
        {
            $book->product()->create([
                'name' => 'Test '.$book->id,
                'brand_id' => Brand::all()->random()->id,
                'version' => '100',
                // 'price' => '10000',
                // 'in_stock' => '100'
            ]);
        }

        $stationeries = Stationery::factory(10)->create();

        foreach ($stationeries as $stationery)
        {
            $stationery->product()->create([
                'name' => 'Test '.$stationery->id,
                'brand_id' => Brand::all()->random()->id,
                'version' => '100',
                // 'price' => '10000',
                // 'in_stock' => '100'
            ]);
        }

        // $goodsReceipts = GoodsReceipt::factory(10)->create([
        //     'employee_id' => Employee::all()->random()->id,
        //     'provider_id' => Provider::all()->random()->id,
        //     'total_price' => 0
        // ]);

        // foreach ($goodsReceipts as $goodsReceipt)
        // {
        //     $details = GoodsReceiptDetail::factory(rand(1, 10))->create([
        //         'goods_receipt_id' => $goodsReceipt->id,
        //     ]);
        //     $goodsReceipt->update([
        //         'total_price' => $details->sum('total')
        //     ]);
        // }

        // foreach ($goodsReceipts as $goodsReceipt)
        // {
        //     $goodsReceipt->payment()->create([
        //         // 'payment_type_id' => PaymentType::all()->random()->id,
        //         // 'payment_method_id' => PaymentMethod::all()->random()->id,
        //         'employee_id' => $goodsReceipt->employee_id,
        //         'money' => $goodsReceipt->total_price,
        //         'note' => 'Phiếu chi tạo tự động cho DNH'.$goodsReceipt->id,
        //         'receiver_type' => 'Nhà cung cấp',
        //         'receiver_id' => $goodsReceipt->provider_id
        //     ]);
        // }

        // $invoice = Invoice::create([
        //     'customer_id' => Customer::all()->random()->id,
        //     'employee_id' => Employee::all()->random()->id,
        //     'total' => 1000,
        //     'paid' => 1000,
        //     'balance' => 0
        // ]);

        // $invoice->details()->create([
        //     'product_id' => 1,
        //     'quantity' => 1,
        //     'cost' => 1000,
        //     'total' => 1000,
        // ]);
    }
}
