<?php

namespace Database\Seeders;

use App\Models\RunningNumber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RunningNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RunningNumber::create([
            'type' => "transaction",
            'prefix' => "ABS",
            'digits' => 7,
        ]);
    }
}
