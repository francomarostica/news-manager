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
            'id' => 10,
            'publish_date' => '2019-03-10 00:10:00',
            'title' => 'Gotas que se secan en el desierto de la recesión',
            'slug' => \App\Helper::getFriendlyURL('Gotas que se secan en el desierto de la recesión'),
            'image' => 'DATA_ART_3229388_1552097541.jpg',
            'outstanding_weight'=>0,
            'category_id' => 'negocios'
        ]);

        DB::table('articles')->insert([
            'id' => 9,
            'publish_date' => '2019-03-10 00:10:00',
            'title' => 'Jugador en las ligas mundiales de la tecnología',
            'slug' => \App\Helper::getFriendlyURL('Jugador en las ligas mundiales de la tecnología'),
            'image' => 'DATA_ART_3229379_1552097771.jpg',
            'outstanding_weight'=>0,
            'category_id' => 'negocios'
        ]);
        
        DB::table('articles')->insert([
            'id' => 8,
            'publish_date' => '2019-03-10 00:10:00',
            'title' => 'Logística, cadena de oportunidades',
            'slug' => \App\Helper::getFriendlyURL('Logística, cadena de oportunidades'),
            'image' => 'logistica_1552182931.jpg',
            'outstanding_weight'=>0,
            'category_id' => 'negocios'
        ]);

        DB::table('articles')->insert([
            'id' => 7,
            'publish_date' => '2019-03-10 19:38:00',
            'title' => 'Avanzan los comicios en Neuquén y el kirchnerismo denunció irregularidades',
            'slug' => \App\Helper::getFriendlyURL('Avanzan los comicios en Neuquén y el kirchnerismo denunció irregularidades'),
            'image' => 'D1TAxO_X4AATYg_1_1552240057.jpg',
            'outstanding_weight'=>1,
            'category_id' => 'politica'
        ]);

        DB::table('articles')->insert([
            'id' => 6,
            'publish_date' => '2019-03-10 19:35:00',
            'title' => 'Fiscales advierten falencias en la lucha antinarco',
            'slug' => \App\Helper::getFriendlyURL('Fiscales advierten falencias en la lucha antinarco'),
            'image' => 'drg_1552172507.jpg',
            'outstanding_weight'=>1,
            'category_id' => 'sucesos'
        ]);

        DB::table('articles')->insert([
            'id' => 5,
            'publish_date' => '2019-03-10 19:34:00',
            'title' => 'Aseguran que el avión caído en Etiopía había aprobado su revisión',
            'slug' => \App\Helper::getFriendlyURL('Aseguran que el avión caído en Etiopía había aprobado su revisión'),
            'image' => 'etiopia43_1552239040.jpg',
            'outstanding_weight'=>1,
            'category_id' => 'sucesos'
        ]);

        DB::table('articles')->insert([
            'id' => 4,
            'publish_date' => '2019-03-10 19:25:00',
            'title' => 'Peña dijo que con Mestre habían acordado que el candidato sería el mejor en las encuestas',
            'slug' => \App\Helper::getFriendlyURL('Peña dijo que con Mestre habían acordado que el candidato sería el mejor en las encuestas'),
            'image' => 'mestre_217_1550484192_1552225230.jpg',
            'outstanding_weight'=>1,
            'category_id' => 'politica'
        ]);
        
        DB::table('articles')->insert([
            'id' => 3,
            'publish_date' => '2019-03-10 18:59:00',
            'title' => 'Caracas vuelve a sufrir un apagón después de algunas horas con suministro de energía',
            'slug' => \App\Helper::getFriendlyURL('Caracas vuelve a sufrir un apagón después de algunas horas con suministro de energía'),
            'image' => 'manifestaciones15_1552239551.jpg',
            'outstanding_weight'=>2,
            'category_id' => 'internacionales'
        ]);

        DB::table('articles')->insert([
            'id' => 2,
            'publish_date' => '2019-03-10 18:48:00',
            'title' => 'Massa busca captar el interés de más de 1.200.000 jovenes',
            'slug' => \App\Helper::getFriendlyURL('Massa busca captar el interés de más de 1.200.000 jovenes'),
            'image' => 'sergio_massa_primer_votante_1552248612.jpg',
            'outstanding_weight'=>2,
            'category_id' => 'politica'
        ]);

        DB::table('articles')->insert([
            'id' => 1,
            'publish_date' => '2019-03-10 18:42:00',
            'title' => 'Viajaban en moto de Mendoza a Córdoba, chocaron y les amputaron las piernas',
            'slug' => \App\Helper::getFriendlyURL('Viajaban en moto de Mendoza a Córdoba, chocaron y les amputaron las piernas'),
            'image' => 'image5c84645f9d17f_1552241998.jpg',
            'outstanding_weight'=>2,
            'category_id' => 'sucesos'
        ]);
        
        
    }
}
