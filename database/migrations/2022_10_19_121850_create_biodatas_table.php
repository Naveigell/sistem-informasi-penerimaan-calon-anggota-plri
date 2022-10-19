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
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('polda_id')->constrained('poldas')->cascadeOnUpdate()->cascadeOnUpdate();
            $table->string('name');
            $table->unsignedInteger('height');
            $table->unsignedInteger('weight');
            $table->string('gender');
            $table->string('birth_place');
            $table->string('religion');
            $table->string('address');
            $table->date('birth_date');
            $table->string('ethnic');
            $table->string('city');
            $table->string('phone');
            $table->string('identity_card');
            $table->string('identity_card_creation_date');
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
        Schema::dropIfExists('biodatas');
    }
};
