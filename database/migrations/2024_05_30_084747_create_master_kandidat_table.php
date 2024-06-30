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
        Schema::create('master_kandidat', function (Blueprint $table) {
            $table->id();
            $table->string('username', 255)->notNull();
            $table->string('no_telpon', 15)->nullable();
            $table->text('description')->nullable();
            $table->string('gambar')->nullable();
            $table->string('unit_kerja', 255)->nullable();
            $table->integer('vote_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_kandidat');
    }
};
