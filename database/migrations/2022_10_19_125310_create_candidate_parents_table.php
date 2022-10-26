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
        Schema::create('candidate_parents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->constrained('candidates')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->string('parent_type')->comment('father, mother or guidance')->nullable();
            $table->string('religion')->nullable();
            $table->unsignedInteger('age')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('landline_phone')->comment('telepon rumah')->nullable();
            $table->string('work_group')->nullable();
            $table->string('type_of_work')->nullable();
            $table->string('grade')->nullable();
            $table->string('position')->nullable();
            $table->string('office_name')->nullable();
            $table->string('office_address')->nullable();
            $table->string('office_phone')->nullable();
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
        Schema::dropIfExists('candidate_parents');
    }
};
