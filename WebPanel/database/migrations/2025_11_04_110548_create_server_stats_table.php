<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('server_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('server_id')->constrained('servers')->onDelete('cascade');
            $table->timestamp('timestamp');
            $table->integer('cpu_percentage')->nullable();
            $table->integer('ram_mb')->nullable();
            $table->integer('disk_gb')->nullable();
            $table->integer('ms')->nullable();
            $table->integer('open_threads')->nullable();
            $table->integer('player_count')->nullable();
            $table->integer('entity_count')->nullable();
            $table->enum('server_status', ['online', 'offline', 'maintenance'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('server_stats');
    }
};
