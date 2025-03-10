<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment');
            $table->integer('user_id')->unsigned();
           
            $table->integer('post_id')->unsigned();
           
            $table->timestamps();

        });

        Schema::table('comments', function ( $table){
             $table->foreign('user_id')->references('id')->on('users');
             $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
         });
    }

    public function down()
    {

       // Schema::dropForeign(['user_id']); 
       // Schema::dropForeign(['post_id']);
        Schema::dropIfExists('comments');
    }
}
