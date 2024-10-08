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
        Schema::create('ytas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_yt');
            $table->string('email_yt')->unique();
            $table->string('phone_yt')->nullable();
            $table->string('address_yt')->nullable();
            $table->string('cccd_yt')->nullable();
            $table->string('gender_yt')->default();
            $table->string('usertype')->default(3);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password_yt');
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ytas');
    }
};
