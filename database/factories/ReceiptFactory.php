<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\ReceiptType;
use App\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReceiptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'receipt_type_id' => ReceiptType::factory()->create()->id,
            // 'payment_method_id' => PaymentMethod::factory()->create()->id,
            'employee_id' => Employee::factory()->create()->id,
            'money' => $this->faker->numberBetween(0, 100) * 1000,
            'note' => $this->faker->nullable()->paragraph(1)
        ];
    }
}
