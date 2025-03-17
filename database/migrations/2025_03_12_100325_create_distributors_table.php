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
        Schema::create('distributors', function (Blueprint $table) {
            $table->id();
            // company details
            $table->string('company_name');
            $table->bigInteger('reg_no');
            $table->integer('founded_year');
            $table->integer('no_of_employees');
            $table->string('company_desc');
            $table->string('company_website');
            // territory details
            $table->string('headquarters_address');
            $table->string('city');
            $table->string('province');
            $table->integer('postal_code');
            $table->string('country');
            $table->string('mpn');
            $table->string('business_email')->unique();
            // admin acc
            $table->string('lastname');
            $table->string('job_title');
            $table->string('department');
            // $table->bigInteger('dpn');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distributors');
    }
};
