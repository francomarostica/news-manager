<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Article::class, 200)->create()->each(function(App\Article $article){
            $article->category_id()->attach($article->category_id);
        });
    }
}
