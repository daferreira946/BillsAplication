<?php


namespace Database\Factories;

use App\Models\Bill;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillFactory extends Factory
{
    protected $model = Bill::class;

    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'type' => $this->faker->numberBetween(0,1),
            'description' => $this->faker->text(),
            'value' => $this->faker->numberBetween(-10000, 10000)
        ];
    }
}
