<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'name' => fake()->name(),
            'customer_id' => fake()->randomElement(['1','2']),
            'purchase_sale_id' => fake()->numberBetween(1,40),
            'debit_credit' => fake()->randomElement(['C','D']),
            'cash_reg_id' => '4',
            'amount' => fake()->numberBetween(100,500),
            'date_of_trans'=>now(),
            'payment_mode' => 'Cash',

        ];
    }
}
