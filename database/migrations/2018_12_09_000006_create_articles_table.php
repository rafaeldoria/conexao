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
            $table->increments('id');
            $table->string('title');
            $table->text('details_article');
            $table->char('visibility', 1);
            $table->integer('total_hits')->nullable()->default(0);
            $table->string('capa_article_link')->nullable();
            $table->unsignedInteger('type_article_id');
            $table->unsignedInteger('author_id');
            $table->foreign('type_article_id')
                ->references('id')->on('types_articles')
                ->onDelete('cascade');
            $table->foreign('author_id')
                ->references('id')->on('authors')
                ->onDelete('cascade');
            $table->softDeletes();
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
