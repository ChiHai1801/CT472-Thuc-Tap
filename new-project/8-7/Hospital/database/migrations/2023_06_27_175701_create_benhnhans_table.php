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
        Schema::create('benhnhans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_bn');
            $table->string('email_bn')->unique();
            $table->string('phone_bn')->nullable();
            $table->string('address_bn')->nullable();
            $table->string('cccd_bn')->unique();
            $table->string('gender_bn')->default();
            $table->date('ngaysinh_bn')->nullable();
            $table->boolean('examination_service')->default();
            $table->boolean('trangthai')->default();
            $table->string('usertype')->default(0);
            $table->timestamp('email_averified_at')->nullable();
            $table->string('password_bn');
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
        Schema::dropIfExists('benhnhans');
    }
};