<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('desc_type_user', 100);
            $table->char('status_type_user', 1)->comment('(A)tivado - (D)esativado');
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
        Schema::dropIfExists('typesUsers');
    }
}
