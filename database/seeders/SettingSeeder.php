<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Setting::create(['name' => 'monthly_profit', 'value' => 12]);
        Setting::create(['name' => 'processing_fee', 'value' => 0]);
    }
}
