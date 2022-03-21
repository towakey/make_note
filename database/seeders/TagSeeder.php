<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('tags')->insert([
            [
                'name' => 'Laravel',
                'slug' => 'laravel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ruby',
                'slug' => 'ruby',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '機械学習',
                'slug' => 'DeepLeaning',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        $faker = Faker::create();
        for ($i=1; $i<=50; $i++){
            \DB::table('note_tag')->insert([
                'note_id' => $i,
                'tag_id' => $faker->numberBetween(1,3),
            ]);
        }
    }
}
