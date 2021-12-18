<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecoveredsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recovereds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',40);
            $table->integer('age');
            $table->text('address');
            $table->text('img');
            $table->string('gender');
            $table->integer('infected_id');
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
        Schema::dropIfExists('recovereds');
    }
}
