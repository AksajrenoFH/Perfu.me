<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama Produk

            // Kolom 1: Untuk Tipe Utama (Sesuai filter sidebar kita)
            $table->enum('category', ['Original', 'Refill'])->nullable();

            // Kolom 2: Untuk Varian/Konsentrasi spesifik parfum (EDP, EDT, dll)
            $table->enum('variant', ['EDP', 'EDT', 'Roll-on', 'Body Mist'])->nullable();

            $table->enum('gender', ['Pria', 'Wanita', 'Unisex'])->nullable();
            $table->string('top_note')->nullable();
            $table->string('middle_note')->nullable();
            $table->string('base_note')->nullable();
            $table->text('composition')->nullable();
            $table->string('packaging')->nullable();
            $table->integer('volume')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('stock')->default(0);
            $table->date('launch_date')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_best_seller')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
