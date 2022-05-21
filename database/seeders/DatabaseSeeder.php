<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\HomePage::factory(10)->create();
         //\App\Models\SecondPage::factory(30)->create();
         //\App\Models\ThirdPage::factory(30)->create();
         //\App\Models\Panel::factory(5)->create();
         \App\Models\Card::factory(10)->create();
    }
}
