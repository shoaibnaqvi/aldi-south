<?php

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
        factory(App\Models\Movie::class, 50)->create()->each(function ($movie
        ) {
            $movie->images()->saveMany(factory(App\Models\Image::class, 5)->make());
            $movie->actors()->saveMany(factory(App\Models\Actor::class, 5)->make());
        });
    }
}
