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
            $table->foreignId('debit_id')->constrained();
            $table->decimal('amount', 8, 2);
            $table->timestamps();

            $table->unique(['debit_id', 'partner_id', 'month']);
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
