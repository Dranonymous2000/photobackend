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
        Schema::create('gallery__details', function (Blueprint $table) {
            $table->id();
            $table->text('short_desc');
            $table->string('long_title');
            $table->text('long_desc');
            $table->string('image');
            $table->string('date');
            $table->string('client');
            $table->string('url');
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
        Schema::dropIfExists('gallery__details');
    }
};
