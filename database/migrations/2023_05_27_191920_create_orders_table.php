<?php

use App\Models\Book;
use App\Models\Cart;
use App\Models\User;
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
            $table->float('total_price')->default(0);
            $table->float('shipping_cost')->default(0);
            $table->json('delivery_details')->nullable();
            $table->uuid('order_number')->unique();
            $table->enum('status', ['shipping', 'rejected', 'delivered', 'pending'])->default('pending');

            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
            $table->json('ordered_books_ids')->nullable(); // this if the order done by the cart
            $table->foreignIdFor(Book::class)->nullable()->constrained()->nullOnDelete();

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
