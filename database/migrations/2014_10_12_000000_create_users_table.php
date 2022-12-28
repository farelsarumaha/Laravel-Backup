<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('user_url')->uniqid();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('gender', ['Pria', 'Perempuan']);
            $table->enum('position', ['Developer', 'Customer', 'Student']);
            $table->enum('title', ['Admin', 'Owner', 'Member'])->default('Member');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
