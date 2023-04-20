<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        // Pivot table role_user Many To Many
        Schema::create('role_user', function (Blueprint $table) {
             $table->id();
             $table->foreignId('role_id')
                   ->constrained()
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
            $table->foreignId('user_id')
                   ->constrained()
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**²²²²
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
