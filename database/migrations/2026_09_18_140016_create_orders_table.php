<?php

use App\Enum\OrderStatus;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('transaction_id')->constrained()->cascadeOnDelete();
            $table->foreignId('service_id')->constrained();
            $table->char('token', 20);
            $table->decimal('weight', 4, 2);
            $table->enum('status', ['Diterima', 'Diproses', 'Selesai', 'Diambil'])->default('Diterima');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
