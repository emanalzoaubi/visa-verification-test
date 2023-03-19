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
        Schema::create('user_companions', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('companion_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('companion_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->primary(['user_id', 'companion_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_companions');
    }
};