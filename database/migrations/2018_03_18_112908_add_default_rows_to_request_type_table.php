<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database;

class AddDefaultRowsToRequestTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_type',function($table) {
            DB::table('request_type')->insert(
                array('id' => 1,
                      'request' => 'Validate Sale',
                      'created_at' => NULL,
                      'updated_at' => NULL)
            );
            DB::table('request_type')->insert(
                array('id' => 2,
                      'request' => 'Moderate Review',
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
        //
    }
}
