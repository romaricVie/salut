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
            //register
            $table->id();
            $table->string('name');
            $table->string('firstname');
            $table->string('sexe');
            $table->string('day');
            $table->string('month');
            $table->year('year');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            // Edit profil
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('job')->nullable();
            $table->string('religion')->nullable();
            $table->text('bio')->nullable();
            $table->string('web')->nullable();
            $table->year('conversion_date')->nullable();
            $table ->dateTime('start_at')->useCurrent();
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
