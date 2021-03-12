<?php

use Illuminate\Database\Seeder;
use App\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Movie::class, 500)->create()->each(function ($movie
        ) {
            $movie->images()->saveMany(factory(App\Models\Image::class, 5)->make());
            $movie->actors()->saveMany(factory(App\Models\Actor::class, 5)->make());
        });
    }
}
