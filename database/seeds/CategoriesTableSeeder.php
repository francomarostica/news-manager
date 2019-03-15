<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Seeds categories table
     *
     * @return void
     */
    public function run()
    {
        factory(App\Category::class, 8)->create();
    }
}