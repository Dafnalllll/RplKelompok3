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
        Schema::create('user_orders', function (Blueprint $table) {
            $table->id();

            // Sinkron dengan tabel orders
            $table->string('order_code')->unique();

            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('user_id');

            $table->date('start_date');     // Tanggal mulai sewa
            $table->date('end_date');       // Tanggal selesai/return

            $table->decimal('total_price', 15, 2);
            $table->string('status');       // status user-side
            $table->string('payment');      // metode bayar user
            $table->text('detail')->nullable();

            $table->timestamps();

            // FK
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_orders');
    }
};
