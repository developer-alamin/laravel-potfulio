<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ResumeMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->char('year',100);
            $table->char('examName',100);
            $table->string('instituteName');
            $table->string('resultYear');
            $table->string('examTitle');
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
