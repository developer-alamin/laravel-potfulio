<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CvMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('cv',function(Blueprint $table)
       {
              $table->bigIncrements('id');
              $table->char('name',100);
              $table->char('father',100);
              $table->char('mother',100);
              $table->char('email');
              $table->char('mobile',20);
              $table->char('workPost');
              $table->char('birth');
              $table->char('postOffice');
              $table->string('facebook');
              $table->string('github');
              $table->string('linkedin');
              $table->string('address');
              $table->string('map');
              $table->char('photo');
              $table->string('MyText');
             $table->char('date');
              
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
