<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PotfulioMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('potfulios',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->char('name',100);
            $table->char('category',100);
            $table->string('technology');
            $table->char('img',100);
            $table->char('date',100);            
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


