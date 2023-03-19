<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->integer('country_code_id');
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->unsignedInteger('place_of_birth');
            $table->unsignedInteger('country_of_residency');
            $table->string('passport_no');
            $table->date('issue_date');
            $table->date('expiry_date');
            $table->unsignedInteger('place_of_issue');
            $table->date('arrival_date');
            $table->string('profession')->nullable();
            $table->string('organization')->nullable();
            $table->integer('visa_duration');
            $table->enum('visa_status', ['multiple', 'single'])->nullable();
            $table->timestamps();

            // $table->unique(['phone_number', 'country_code_id']);

            $table->foreign('place_of_birth')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade');
            $table->foreign('country_of_residency')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade');
            $table->foreign('place_of_issue')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade');
            $table->foreign('country_code_id')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade');

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