<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database;

class AddDefaultRowsToQtiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qties',function($table) {
            DB::table('qties')->insert(
                array('id' => 0,
                      'name' => 'kg',
                      'created_at' => NULL,
                      'updated_at' => NULL)
            );
            DB::table('qties')->insert(
                array('id' => 1,
                      'name' => 'g',
                      'created_at' => NULL,
                      'updated_at' => NULL)
            );
            DB::table('qties')->insert(
                array('id' => 2,
                      'name' => 'l',
                      'created_at' => NULL,
                      'updated_at' => NULL)
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qties',function($table) {
            //
        });
    }
}
