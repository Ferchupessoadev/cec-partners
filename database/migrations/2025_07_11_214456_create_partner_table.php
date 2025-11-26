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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->integer('phone')->nullable();
            $table->string('email')->nullable();
            $table->integer('dni')->unique();
            $table->string('sexo');
            $table->boolean('active')->default(true);
            $table->date('date_of_birth');
            $table->date('date_of_registration');
            $table->string('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner');
        Schema::dropIfExists('cuotas');
    }
};
