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
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('content')->default('');
            $table->string('image')->default('');
            $table->integer('category_id')->default(0)->unsigned();
            $table->string('topics')->default('');
            $table->integer('author_id')->default(0)->unsigned();
            $table->tinyInteger('outstanding_weight')->default(0)->unsigned();
            $table->string('state')->default('DRAFT');
            $table->timestamps();

            //Relation
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
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
