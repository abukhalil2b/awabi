<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\State;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('app')->default('distance');// admin - distance - attendance
            $table->string('phone')->nullable()->unique();
            $table->string('password');
            $table->string('plain_password',30);
            
            $table->foreignIdFor(State::class)
            ->nullOnDelete()
            ->nullable();
            $table->string('status')->default('active');

            $table->rememberToken();
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
        Schema::dropIfExists('states');
        Schema::dropIfExists('users');
    }
};
