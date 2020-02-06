<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFortunesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fortunes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->comment('日期');
            $table->string('name', 7)->comment('星座名稱');
            $table->string('all', 511)->comment('整體運勢');
            $table->string('love', 511)->comment('愛情運勢');
            $table->string('job', 511)->comment('事業運勢');
            $table->string('money', 511)->comment('財運運勢');
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
        Schema::dropIfExists('fortunes');
    }
}
