<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryQuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_quote')->insert([
            'quote_id' => 1,
            'category_id' => 5,
        ]);

        DB::table('category_quote')->insert([
            'quote_id' => 2,
            'category_id' => 4,
        ]);

        DB::table('category_quote')->insert([
            'quote_id' => 3,
            'category_id' => 2,
        ]);

        DB::table('category_quote')->insert([
            'quote_id' => 4,
            'category_id' => 5,
        ]);
    }
}
