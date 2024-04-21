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
        Schema::create('eggs', function (Blueprint $table) {
            $table->id();
            $table->integer('peewee_count')->default(0);
            $table->integer('pullet_count')->default(0);
            $table->integer('small_count')->default(0);
            $table->integer('medium_count')->default(0);
            $table->integer('large_count')->default(0);
            $table->integer('extra_large_count')->default(0);
            $table->integer('jumbo_count')->default(0);
            $table->integer('crack_count')->default(0);
            $table->date('sorting_date')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eggs');
    }
};
