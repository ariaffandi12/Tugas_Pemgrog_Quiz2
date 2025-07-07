<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_apply_societies', function (Blueprint $table) {
            $table->id();
            $table->text('notes')->nullable();
            $table->date('date');
            $table->foreignId('society_id')->constrained('societies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('job_vacancy_id')->nullable()->constrained('job_vacancies')->onDelete('cascade')->onUpdate('cascade');

            $table->index('society_id');
            $table->index('job_vacancy_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_apply_societies');
    }
};
