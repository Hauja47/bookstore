<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\PaymentMethod;
use App\Models\PaymentType;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'payment_type_id' => PaymentType::factory()->create()->id,
            'payment_method_id' => PaymentMethod::factory()->create()->id,
            'employee_id' => Employee::factory()->create()->id,
            'money' => $this->faker->numberBetween(0, 100) * 1000,
            'note' => $this->faker->nullable()->paragraph(1)
        ];
    }
}
