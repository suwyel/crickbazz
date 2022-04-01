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
        Schema::create('poing_tables', function (Blueprint $table) {
            $table->id();
            $table->string('img')->nullable();
            $table->string('team')->nullable();
            $table->string('mat')->nullable();
            $table->string('won')->nullable();
            $table->string('lost')->nullable();
            $table->string('nr')->nullable();
            $table->string('pts')->nullable();
            $table->string('nrr')->nullable();
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
        Schema::dropIfExists('poing_tables');
    }
};