<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\product;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        //product::factory()->count(80)->create();
        $this->call(YourDataSeeder::class);
    }
}
