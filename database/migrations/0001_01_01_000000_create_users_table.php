<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()
                   ->onDelete('cascade');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['user', 'admin', 'superadmin']);
            $table->rememberToken();
            $table->timestamps();
        });

        $user = new User;

        $user->name = 'Superadmin';
        $user->email = 'zeus@theadmin.com';
        $user->password = '12345678910';
        $user->role = 'superadmin';
        $user->save();

        $user = new User;

        $user->name = 'admin';
        $user->email = 'angel@miniadmin.es';
        $user->password = '12345678';
        $user->role = 'admin';
        $user->save();

        $user = new User;

        $user->name = 'pepe';
        $user->email = 'p@example.es';
        $user->password = '12345678';
        $user->role = 'user';
        $user->save();

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
