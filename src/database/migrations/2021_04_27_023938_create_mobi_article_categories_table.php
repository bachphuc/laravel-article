<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobiArticleCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobi_article_categories', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title')->nullable();
            $table->string('alias')->nullable();
            $table->string('description')->nullable();

            $table->string('image')->nullable();

            $table->integer('user_id')->default(0);

            $table->integer('total_article')->default(0);
            $table->string('color')->nullable();
            $table->string('icon_text')->nullable();
            $table->string('icon_class')->nullable();

            $table->integer('site_id')->default(0);

            $table->string('thumbnail_120')->nullable();
            $table->string('thumbnail_300')->nullable();
            $table->string('thumbnail_500')->nullable();
            $table->string('thumbnail_720')->nullable();

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
        Schema::dropIfExists('mobi_article_categories');
    }
}
