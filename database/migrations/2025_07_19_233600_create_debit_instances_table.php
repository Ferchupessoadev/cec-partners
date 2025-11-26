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
        Schema::create('debit_instances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('debits_id')->constrained();
            $table->string('name');
            $table->decimal('amount', 8, 2);
            $table->date('due_date');
            $table->timestamps();

            $table->unique(['debits_id', 'due_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debit_instances');
    }
};
