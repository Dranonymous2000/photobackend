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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->text('service_description');
            $table->string('service_type1');
            $table->string('service_type1_desc');
            $table->string('service_type2');
            $table->string('service_type2_desc');
            $table->string('service_type3');
            $table->string('service_type3_desc');
            $table->string('service_type4');
            $table->string('service_type4_desc');
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
        Schema::dropIfExists('services');
    }
};
