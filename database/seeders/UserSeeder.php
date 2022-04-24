<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
                'id' => (string) Str::orderedUuid(),
                'name' => 'admin',
                'server' => config('app.server_serial', ''),
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => \Hash::make('123456789'),
                'role' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => (string) Str::orderedUuid(),
                'name' => 'test',
                'server' => config('app.server_serial', ''),
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
