<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('restaurant_name');
            $table->string('subject');
            $table->string('body');
            $table->boolean('approve')->default(0);
            $table->string('image')->nullabel();
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
