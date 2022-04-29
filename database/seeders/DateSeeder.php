<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dates')->insert([
            'date_of_publish' => 'january-1',
        ]);

        DB::table('dates')->insert([
            'date_of_publish' => 'january-2',
        ]);

        DB::table('dates')->insert([
            'date_of_publish' => 'january-3',
        ]);
     }

}
