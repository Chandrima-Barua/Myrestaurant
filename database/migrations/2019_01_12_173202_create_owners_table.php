<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('restaurant_name');
            $table->string('address');
            $table->string('categories');
            $table->string('phone_number');
            $table->string('seating_capacity');
            $table->string('time');
            $table->string('image')->nullabel();
           
            $table->timestamps();
        });

       /* Schema::table('owners', function ( $table){
        
             
         });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       // Schema::dropColumn('cat_id'); 
        Schema::dropIfExists('owners');
    }
}
