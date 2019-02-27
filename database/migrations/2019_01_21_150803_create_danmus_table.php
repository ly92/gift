<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanmusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danmus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('device')->nullable();
            $table->string('nickName')->nullable();
            $table->string('avatar')->nullable();
            $table->string('text')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('isnew')->nullable()->default('1');
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
        Schema::dropIfExists('danmus');
    }
}
