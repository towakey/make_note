<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('users')->insert([
            [
                'id' => 'admin',
                'name' => 'admin',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => \Hash::make('123456789'),
                'role' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'test',
                'name' => 'test',
                'email' => 'test@example.com',
                'email_verified_at' => now(),
                'password' => \Hash::make('123456789'),
                'role' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
