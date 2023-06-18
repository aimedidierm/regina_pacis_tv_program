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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('descrption');
            $table->string('video');
            $table->float('price');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->on('customers')->references('id')->onDelete("restrict");
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->on('categories')->references('id')->onDelete("restrict");
            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id')->on('subcategories')->references('id')->onDelete("restrict");
            $table->enum('status', ['pending', 'approved', 'payed', 'expired']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
