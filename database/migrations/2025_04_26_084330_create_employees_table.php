<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->uuid('employee_id')->unique();
            $table->string('user_name');
            $table->string('name_prefix')->nullable();
            $table->string('first_name');
            $table->string('middle_initial')->nullable();
            $table->string('last_name');
            $table->string('gender');
            $table->string('email')->unique();
            $table->date('date_of_birth');
            $table->time('time_of_birth')->nullable();
            $table->integer('age_in_years')->nullable();
            $table->date('date_of_joining');
            $table->integer('age_in_company_years')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('place_name')->nullable();
            $table->string('county')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('region')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
