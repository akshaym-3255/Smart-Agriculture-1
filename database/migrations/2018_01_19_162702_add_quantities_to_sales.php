<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuantitiesToSales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales',function($table) {
            $table->integer('quantity');
            $table->integer('perquan');
            $table->integer('perprice');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function($table){
            $table->dropColumn('quantity');
            $table->dropColumn('perquan');
            $table->dropColumn('perprice');
        });
    }
}
