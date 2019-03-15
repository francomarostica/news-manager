<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        factory(App\Article::class, 200)->create()->each(function(App\Article $article){
            $article->tags()->attach($article->category_id);
        });
        */

        factory(App\Article::class, 200)->create();
    }
}
