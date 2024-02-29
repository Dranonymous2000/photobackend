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
        Schema::create('gallery_descs', function (Blueprint $table) {
            $table->id();
            $table->text('nature_desc');
            $table->string("image_name");
            $table->text('sport_desc');
            $table->text('people_desc');
            $table->text('other_desc');
            $table->text('architecture_desc');
            $table->text('travel_desc');
            $table->text('animal_desc');
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
        Schema::dropIfExists('gallery_descs');
    }
};
