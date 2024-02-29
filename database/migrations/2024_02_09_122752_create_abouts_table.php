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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('about_title');
            $table->text('about_description');
            $table->string('about_intro');
            $table->string('about_image');
            $table->string('birthday');
            $table->string('age');
            $table->string('website');
            $table->string('degree');
            $table->string('phone');
            $table->string('email');
            $table->string('city');
            $table->string('freelance');
            $table->text('about_longdescription');
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
        Schema::dropIfExists('abouts');
    }
};
