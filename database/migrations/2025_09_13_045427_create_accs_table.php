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
        Schema::create('accs', function (Blueprint $table) {
            $table->id();
            $table->string('accid')->unique();  
            $table->string('name');
            $table->date('birthdate');
            $table->integer('age')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->string('username')->unique();
            $table->string('password');
            $table->string('role')->default('user');
            $table->string('qr_code')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accs');
    }
};
