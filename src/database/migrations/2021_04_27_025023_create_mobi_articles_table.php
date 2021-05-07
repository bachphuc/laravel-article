<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobiArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobi_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('short_description')->nullable();
            $table->mediumText('content')->nullable();
            
            $table->string('image')->nullable();
            $table->string('thumbnail_500')->nullable();
            $table->string('thumbnail_320')->nullable();
            $table->string('thumbnail_270')->nullable();
            $table->string('thumbnail_120')->nullable();
            $table->string('cover')->nullable();
            $table->integer('user_id')->nullable()->default(0);
            $table->string('alias')->nullable();

            $table->integer('site_id')->default(0);

            $table->integer('category_id')->default(0);
            $table->string('status', 20)->default('');
            $table->string('source_name')->nullable();
            $table->string('source_url')->nullable();

            $table->integer('total_comment')->default(0);
            $table->integer('total_like')->default(0);
            $table->integer('total_view')->default(0);

            $table->tinyInteger('is_disable_ads')->default(0);
            $table->tinyInteger('is_expired')->default(0);
            $table->string('category_type')->nullable();

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
