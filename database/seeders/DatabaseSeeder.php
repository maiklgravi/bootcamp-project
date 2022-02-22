<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\BlogTag;
use App\Models\Comment;
use App\Models\Film;
use App\Models\Genre;
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
        Article::factory()
            ->count(10)
            ->has(BlogTag::factory(), 'blogTags')
            ->create();

        Comment::factory()->count(20)->create();
        Film::factory()
        ->count(10)
        ->create();
    }
}
