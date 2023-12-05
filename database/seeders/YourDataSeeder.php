<?php

namespace Database\Seeders;
use App\Models\Company;
use App\Models\Product;
use App\Models\Employee;
use App\Models\cities;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class YourDataSeeder extends Seeder
{

    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Jawad',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(123456),
        ]);
        //Example using raw database query
        Company::create([
            'name' => 'Iphone14',
            'email' => 'iphone14@gmail.com',
            'logo' => '/storage/images/1690280341download2.jpg',
            'website' => 'www.iphone14.org'
        ]);
        Employee::create([
            'firstname' => 'Muhammad',
            'lastname' => 'Kashif',
            'company' => 'Redmi',
            'email' => 'sk47@47.com',
            'phone' => '03484211366'
        ]);
        Product::create([
            'name' => 'OPPO',
            'detail' => 'Superb In Use'
        ]);
        cities::create([
              'name' => 'OPP',
              'description' => 'Superb',
              'code' => '2'
         ]);
    }
}
