<?php

namespace Database\Seeders;

use App\Models\HomePage;
use App\Models\SecondPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
         \App\Models\HomePage::factory()->count(1)->create();
         \App\Models\SecondPage::factory(15)->create();
         \App\Models\ThirdPage::factory(15)->create();
         \App\Models\Panel::factory(5)->create();
         \App\Models\Card::factory(10)->create();



    }
}
