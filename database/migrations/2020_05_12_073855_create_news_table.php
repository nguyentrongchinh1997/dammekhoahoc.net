<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 500);
            $table->string('slug', 500);
            $table->string('image', 255);
            $table->text('summury', 1000);
            $table->longText('content');
            $table->longText('content_origin');
            $table->integer('view')->default(1);
            $table->integer('category_id');
            $table->string('keyword', 500)->nullable();
            $table->string('link');
            $table->string('md5_link');
            $table->string('author', 255);
            $table->date('date');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
