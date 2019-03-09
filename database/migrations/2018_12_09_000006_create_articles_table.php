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
            $table->string('title', 255);
            $table->string('summary', 255);
            $table->text('details_article');
            $table->char('visibility', 1)->comment('S Liberado - N Fechado');
            $table->integer('total_hits')->nullable()->default(0);
            $table->string('img_capa_article', 255)->nullable();
            $table->string('img_carousel_article', 255)->nullable();
            $table->unsignedInteger('type_article_id');
            $table->unsignedInteger('user_data_id');
            $table->foreign('type_article_id')
                ->references('id')->on('types_articles')
                ->onDelete('cascade');
            $table->foreign('user_data_id')
                ->references('id')->on('user_datas')
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
