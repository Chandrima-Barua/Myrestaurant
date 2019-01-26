<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('comment');
            
            $table->integer('customer_post_id')->unsigned();
           
            $table->timestamps();
        });
         Schema::table('customer_comments', function ( $table){
             
             $table->foreign('customer_post_id')->references('id')->on('customer_posts')->onDelete('cascade');
             
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_comments');
    }
}
