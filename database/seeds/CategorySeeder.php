<?php

/**
 * @author Franco Marostica <fdmarostica84@gmail.com>
 */

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds with categories for articles.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'title' => 'Politica',
            'image' => '',
            'url' => 'politica'
        ]);

        DB::table('categories')->insert([
            'id' => 2,
            'title' => 'Negocios',
            'image' => '',
            'url' => 'negocios'
        ]);

        DB::table('categories')->insert([
            'id' => 3,
            'title' => 'Sucesos',
            'image' => '',
            'url' => 'sucesos'
        ]);

        DB::table('categories')->insert([
            'id' => 4,
            'title' => 'Internacionales',
            'image' => '',
            'url' => 'internacionales'
        ]);

        DB::table('categories')->insert([
            'id' => 5,
            'title' => 'Tecnología',
            'image' => '',
            'url' => 'tecnologia'
        ]);
    }
}
