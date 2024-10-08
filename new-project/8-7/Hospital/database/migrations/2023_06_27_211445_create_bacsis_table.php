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
        Schema::create('bacsis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_bs');
            $table->string('email_bs')->unique();
            $table->string('phone_bs')->nullable();
            $table->string('address_bs')->nullable();
            $table->string('cccd_bs')->nullable();
            $table->string('gender_bs')->default();
            $table->string('usertype')->default(2);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password_bs');
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bacsis');
    }
};
