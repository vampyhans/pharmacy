<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        \App\Models\User::factory()->create([
            'name' => 'Pharmacy',
            'email' => 'pharmacy@gmail.com',
            'password' => bcrypt('12345678'),
            'address' => 'pharmacy',
            'dob' => '2022-11-5',
            'contact' => '0762736827',
            'type' => 'pharmacy',
        ]);
    }
}
