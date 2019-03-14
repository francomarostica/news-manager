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
            $table->text('description');
            $table->string('content')->default('');
            $table->string('image')->default('');
            $table->unsignedInteger('category_id')->default(0);
            $table->string('topics')->default('');
            $table->unsignedInteger('author_id')->default(0);
            $table->unsignedTinyInteger('outstanding_weight')->default(0);
            $table->string('state')->default('DRAFT');
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
