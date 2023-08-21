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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('descrption')->nullable();
            $table->integer('time');
            $table->integer('price');
            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id')->on('subcategories')->references('id')->onDelete("restrict");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
