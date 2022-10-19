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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('biodata_id')->constrained('biodatas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('primary_school_name');
            $table->string('primary_school_graduated_year');
            $table->string('primary_school_city');
            $table->string('primary_school_province');
            $table->string('junior_high_school_name');
            $table->string('junior_high_school_graduated_year');
            $table->string('junior_high_school_city');
            $table->string('junior_high_school_province');
            $table->string('senior_high_school_name');
            $table->string('senior_high_school_graduated_year');
            $table->string('senior_high_school_city');
            $table->string('senior_high_school_province');
            $table->string('senior_high_school_department');
            $table->string('senior_high_school_certificate');
            $table->double('senior_high_school_exam_score', 255, 3);
            $table->double('senior_high_school_report', 255, 3);
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
        Schema::dropIfExists('education');
    }
};
