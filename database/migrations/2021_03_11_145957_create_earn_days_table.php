<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEarnDaysTable extends Migration
{
    /**
     * Run the migrations. 
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earn_days', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staking_earn_id')->unsigned();
            $table->double('earn',20,8)->default(0);
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->foreign('staking_earn_id')->references('id')->on('staking_earns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('earn_days');
    }
}
