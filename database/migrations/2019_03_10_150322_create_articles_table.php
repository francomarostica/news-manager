<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('publish_date');
            $table->string('title');
            $table->string('image')->default('logo-example.jpg');
            $table->string('category_id');
            $table->string('topics')->default('');
            $table->unsignedInteger('author_id')->default(0);
            $table->unsignedTinyInteger('outstanding_weight')->default(0);
            $table->boolean('published')->default(1);
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
        Schema::dropIfExists('articles');
    }
}
