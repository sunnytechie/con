<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Price::create([
            'daily_dynamite' => '500',
            'daily_fountain' => '500',
            'bible_study' => '500',
            'cyc' => '3500',
            'cyc_calender' => '3500',
            'bcp' => '1500',
            'hymnal' => '1500',
        ]);
    }
}
