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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('mi');
            $table->string('image')->nullable();
            $table->string('email')->unique();
            $table->date('date_of_birth')->nullable();
            $table->string('region')->nullable();
            $table->string('province')->nullable();
            $table->string('municipality')->nullable();
            $table->text('about')->nullable();
            $table->string('specialties')->nullable();
            $table->text('specialties_description')->nullable();
            $table->string('highest_level_of_education')->nullable();
            $table->string('institution_name')->nullable();
            $table->string('field_of_study')->nullable();
            $table->date('education_start_date')->nullable();
            $table->date('graduation_date')->nullable();
            $table->string('job_title')->nullable();
            $table->string('company_name')->nullable();
            $table->date('job_start_date')->nullable();
            $table->date('job_end_date')->nullable();
            $table->text('job_description')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
