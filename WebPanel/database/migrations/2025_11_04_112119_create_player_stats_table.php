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
        Schema::create('player_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('server_id')->constrained('servers')->onDelete('cascade');
            $table->timestamp('timestamp');
            $table->string('player_uuid');
            $table->integer('kills')->nullable();
            $table->integer('deaths')->nullable();
            $table->bigInteger('playtime_ms')->nullable();
            $table->boolean('is_online')->default(false);
            $table->timestamp('last_login')->nullable();
            $table->string('current_world')->nullable();
            $table->string('position')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_stats');
    }
};
