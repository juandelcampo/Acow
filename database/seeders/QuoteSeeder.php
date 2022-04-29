<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quotes')->insert([
            'quote'=> 'A book must be the axe for the frozen sea within us.',
            'Author_id'=>1,
            'Date_id'=>1,

        ]);

        DB::table('quotes')->insert([
            'quote'=> 'A path is made by walking on it.',
            'Author_id'=>2,
            'Date_id'=>2,
        ]);

        DB::table('quotes')->insert([
            'quote'=> 'The way to know life is to love many things.',
            'Author_id'=>3,
            'Date_id'=>3,
        ]);

        DB::table('quotes')->insert([
            'quote'=> 'Writing is nothing more than a guided dream.',
            'Author_id'=>7,
            'Date_id'=>7,
        ]);
    }
}
