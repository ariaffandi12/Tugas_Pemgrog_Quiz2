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
        Schema::create('validations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_category_id')->constrained('job_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('society_id')->constrained('societies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('validator_id')->nullable()->constrained('validators')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status', ['accepted', 'declined', 'pending'])->default('pending');
            $table->text('work_experience')->nullable();
            $table->text('job_position')->nullable();
            $table->text('reason_accepted')->nullable();
            $table->text('validator_notes')->nullable();

            $table->index('society_id', 'consultations_society_id_foreign');
            $table->index('validator_id', 'consultations_doctor_id_foreign');
            $table->index('job_category_id', 'validations_job_category_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validations');
    }
};
