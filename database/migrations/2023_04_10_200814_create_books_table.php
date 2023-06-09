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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('author_name');
            $table->string('publisher');
            $table->string('category')->nullable();
            $table->text('small_description');
            $table->text('long_description');
            $table->float('price');
            $table->bigInteger('order_number')->default(0);
            $table->date('publish_date')->default(now());
            $table->string('face_image');
            $table->bigInteger('likes_count')->default(0);
            $table->bigInteger('quantity')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
