<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->longText('message');
            $table->string('image')->nullable();
            $table->string('menu');
            $table->enum('status', ['ACTIF', 'INACTIF'])->default('INACTIF');
            $table ->dateTime('start_at')->useCurrent();
            $table->foreignId('user_id')
                   ->constrained()
                   ->onUpdate('cascade')
                   ->onDelete('cascade'); 
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
        Schema::dropIfExists('posts');
    }
}
