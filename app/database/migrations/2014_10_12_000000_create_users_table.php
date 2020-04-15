<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('name')->index('idx-users-name');
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->enum('role',['user','admin']);
            $table->enum('sex',['male','female']);
            $table->float('salary',7,2);
            $table->boolean('active')->default(false);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable()->default('now()');
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
}
