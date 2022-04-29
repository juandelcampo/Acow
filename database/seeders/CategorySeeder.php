<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category' => 'art',
        ]);

        DB::table('categories')->insert([
            'category' => 'existence',
        ]);

        DB::table('categories')->insert([
            'category' => 'death',
        ]);

        DB::table('categories')->insert([
            'category' => 'life',
        ]);

        DB::table('categories')->insert([
            'category' => 'literature',
        ]);

    }
}
