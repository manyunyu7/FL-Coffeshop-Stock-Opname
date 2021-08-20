<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MappingMenuMaterial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapping_menu_material', function (Blueprint $table) {
            $table->id();
            $table->string('id_material')->nullable();
            $table->string('id_menu')->nullable();
            $table->string('amount')->nullable();
            $table->foreign('id_menu')->references('id')->on('menus');
            $table->foreign('id_material')->references('id')->on('materials');
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
        Schema::dropIfExists('mapping_menu_material');
    }
}
