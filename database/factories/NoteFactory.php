<?php

namespace Database\Factories;

use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Str;

class NoteFactory extends Factory
{
    protected $model = Note::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userUnique = User::groupBy('id')->get(['id']);
        $random_date = $this->faker->dateTimeBetween('-1year', '-1day');
        return [
            //
            'uuid' => (string) Str::orderedUuid(),
            'title' => $this->faker->realText(rand(20,50)),
            'body' => $this->faker->realText(rand(100,200)),
            'is_public' => $this->faker->boolean(90),
            'published_at' => $random_date,
            'user_id' => $userUnique[$this->faker->numberBetween(1,2)-1]['id'],
            'created_at' => $random_date,
            'updated_at' => $random_date
        ];
    }
}
