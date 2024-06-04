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
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->decimal('duration', 5, 2); // Ajuste de precisión para la duración
            $table->string('front');
            $table->string('genre');
            $table->date('release_date');
            $table->string('artists');
            $table->string('song_route');
            $table->timestamps();
        });
    }
    
    public function down(): void{
        Schema::dropIfExists('songs');
    }
};
