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
            $table->foreignId('customer_id')->constrained('users');
            $table->foreignId('service_id')->constrained();
            $table->char('token', 20)->unique();
            $table->decimal('weight', 4, 2);
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['Menunggu' ,'Diterima', 'Diproses', 'Selesai', 'Diambil'])->default('Diterima');
            $table->text('note')->nullable();
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
