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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('polda_id')->constrained('poldas')->cascadeOnUpdate()->cascadeOnUpdate();
            $table->foreignId('polres_id')->constrained('polres')->cascadeOnUpdate()->cascadeOnUpdate();
            $table->string('registration_number');
            $table->string('password');
            $table->string('type')->comment('akpol, ssps, tamtama, bintara');
            $table->string('email');
            $table->string('name');
            $table->unsignedInteger('height');
            $table->unsignedInteger('weight');
            $table->string('avatar');
            $table->string('gender')->comment('male or female');
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
