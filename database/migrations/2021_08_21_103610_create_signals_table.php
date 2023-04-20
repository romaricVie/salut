<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signals', function (Blueprint $table) {
             $table->id();
             $table->string('message');
             $table->string('image')->nullable();
             $table->foreignId('communaute_id') // id communaute
                   ->constrained()
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
            $table->foreignId('user_id') // id_adim
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
        Schema::dropIfExists('signals');
    }
}
