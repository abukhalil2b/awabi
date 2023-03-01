<?php

use App\Models\Cate;
use App\Models\Question;
use App\Models\Roundplay;
use App\Models\User;
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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->string('app');// distance - attendance
  

            $table->foreignIdFor(Roundplay::class)
            ->nullOnDelete()
            ->nullable();

            $table->foreignIdFor(Cate::class)
            ->nullOnDelete()
            ->nullable();

            $table->foreignIdFor(Question::class)
            ->nullOnDelete()
            ->nullable();

            $table->foreignIdFor(User::class)
            ->nullOnDelete()
            ->nullable();
            
            $table->string('phone')->nullable();
            $table->text('ans');
            $table->boolean('correct')->default(0);
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
        Schema::dropIfExists('answers');
    }
};
