<?php

namespace Database\Seeders;

use App\Models\Bill;
use Illuminate\Database\Seeder;

class BillsSeeder extends Seeder
{
    public function run()
    {
        Bill::factory(30)->create();
    }
}
