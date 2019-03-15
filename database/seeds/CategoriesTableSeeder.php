<?php

use Illuminate\Database\Seeder;

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