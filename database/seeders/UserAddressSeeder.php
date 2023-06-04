<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserAddress;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserAddress::create([
            'name' => 'John Doe',
            'address' => '123 Main St',
            'city' => 'New York',
            'province' => 'New York',
            'country' => 'USA',
            'postal_code' => '10001',
            'user_id' => 1,
        ]);
    }
}
