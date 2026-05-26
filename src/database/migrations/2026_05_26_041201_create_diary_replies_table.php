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
        Schema::create('diary_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diary_id')->constrained()->onDelete('cascade')->comment('日記ID');
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('親ID');
            $table->text('reply_text')->comment('返信内容');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diary_replies');
    }
};
