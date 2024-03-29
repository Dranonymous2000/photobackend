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
        Schema::create('natures', function (Blueprint $table) {
            $table->id();
            $table->string("nature_image");
            $table->string("image_name");
            $table->text("short_desc");
            $table->string("long_title");
            $table->text("long_desc");
            $table->string("nature_image2");
            $table->string("date");
            $table->string("client");
            $table->string("url");

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
        Schema::dropIfExists('natures');
    }
};
