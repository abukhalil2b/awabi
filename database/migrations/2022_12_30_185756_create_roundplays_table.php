<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roundplays', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('status')->default('active');// active - disable
        });

        Schema::create('user_roundplay', function (Blueprint $table) {
            $table->integer('user_id');            
            $table->integer('roundplay_id');            
            $table->integer('mark')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roundplays');
        Schema::dropIfExists('user_roundplay');
    }
};
