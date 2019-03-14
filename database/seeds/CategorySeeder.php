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
        factory(App\Category::class, 8)->create();
    }
}
