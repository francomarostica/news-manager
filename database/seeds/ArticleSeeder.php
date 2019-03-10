<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'id' => 7,
            'title' => 'Avanzan los comicios en Neuquén y el kirchnerismo denunció irregularidades',
            'image' => 'D1TAxO_X4AATYg_1_1552240057.jpg',
            'category_id' => 'politica'
        ]);

        DB::table('articles')->insert([
            'id' => 6,
            'title' => 'Fiscales advierten falencias en la lucha antinarco',
            'image' => 'drg_1552172507.jpg',
            'category_id' => 'sucesos'
        ]);

        DB::table('articles')->insert([
            'id' => 5,
            'title' => 'Aseguran que el avión caído en Etiopía había aprobado su revisión',
            'image' => 'etiopia43_1552239040.jpg',
            'category_id' => 'sucesos'
        ]);

        DB::table('articles')->insert([
            'id' => 4,
            'title' => 'Peña dijo que con Mestre habían acordado que el candidato sería el mejor en las encuestas',
            'image' => 'mestre_217_1550484192_1552225230.jpg',
            'category_id' => 'politica'
        ]);
        
        DB::table('articles')->insert([
            'id' => 3,
            'title' => 'Caracas vuelve a sufrir un apagón después de algunas horas con suministro de energía',
            'image' => 'manifestaciones15_1552239551.jpg',
            'category_id' => 'internacionales'
        ]);

        DB::table('articles')->insert([
            'id' => 2,
            'title' => 'Massa busca captar el interés de más de 1.200.000 jovenes',
            'image' => 'sergio_massa_primer_votante_1552248612.jpg',
            'category_id' => 'politica'
        ]);

        DB::table('articles')->insert([
            'id' => 1,
            'title' => 'Viajaban en moto de Mendoza a Córdoba, chocaron y les amputaron las piernas',
            'image' => 'image5c84645f9d17f_1552241998.jpg',
            'category_id' => 'sucesos'
        ]);
        
        
    }
}
