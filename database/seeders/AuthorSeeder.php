<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            'author' => 'Franz Kafka',
            'lifetime' => '1883-1924',
            'nationality' => 'Czech',
            'url'=>'https://en.wikipedia.org/wiki/Franz_Kafka',
        ]);

        DB::table('authors')->insert([
            'author' => 'Chuang Tzu',
            'lifetime' => '369 BC - 286 BC',
            'nationality' => 'Chinese',
            'url'=>'https://en.wikipedia.org/wiki/Zhuang_Zhou',
        ]);

        DB::table('authors')->insert([
            'author' => 'Vincent Van Gogh',
            'lifetime' => '1853 - 1890',
            'nationality' => 'Dutch',
            'url'=>'https://en.wikipedia.org/wiki/Vincent_van_Gogh',

        ]);

            DB::table('authors')->insert([
                'author' => 'Henri Matisse',
                'lifetime' => '1869 - 1954',
                'nationality' => 'French',
                'url'=>'https://en.wikipedia.org/wiki/Henri_Matisse',
        ]);

            DB::table('authors')->insert([
            'author' => 'Pablo Picasso',
            'lifetime' => '1881 - 1973',
            'nationality' => 'Spanish',
            'url'=>'https://en.wikipedia.org/wiki/Pablo_Picasso',

        ]);

        DB::table('authors')->insert([
            'author' => 'Paul Gauguin',
            'lifetime' => '1848 - 1903',
            'nationality' => 'French',
            'url'=>'https://en.wikipedia.org/wiki/Paul_Gauguin',

        ]);

        DB::table('authors')->insert([
            'author' => 'Jorge Luis Borges',
            'lifetime' => '1899 - 1986',
            'nationality' => 'Argentinian',
            'url'=>'https://en.wikipedia.org/wiki/Jorge_Luis_Borges',

        ]);

        DB::table('authors')->insert([
            'author' => 'Li Po',
            'lifetime' => '701 - 762',
            'nationality' => 'Chinese',
            'url'=>'https://en.wikipedia.org/wiki/Li_Bai',
        ]);

    }
}
