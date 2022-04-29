<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDateColumnInQuote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('quotes', function($table) {
        $table->date('publish_date')->nullable();
    });
}



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('quotes', function($table) {
            $table->dropColumn('date');
        });
    }
}
