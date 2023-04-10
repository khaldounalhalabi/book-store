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
            $table->string('name') ;
            $table->boolean('is_original')->default(true) ;
            $table->string('author_name') ;
            $table->string('publisher') ;
            $table->string('category') ;
            $table->text('small_description') ;
            $table->text('long_description') ;
            $table->float('price') ;
            $table->bigInteger('order_number')->default(0) ;
            $table->date('publish_date')->default(now()) ;
            $table->string('face_image') ;
            $table->string('back_image') ;
            $table->bigInteger('likes')->default(0) ;
            $table->bigInteger('dislikes')->default(0) ;
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
