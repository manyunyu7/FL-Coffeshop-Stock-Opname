<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockOpnameDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_opname_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_material')->nullable();
            $table->unsignedBigInteger('id_opname')->nullable();
            $table->string('used_stock')->nullable();
            $table->string('remaining_stock')->nullable();
            $table->foreign('id_opname')->references('id')->on('stock_opnames')->onDelete('cascade');
            $table->foreign('id_material')->references('id')->on('materials')->onDelete('cascade');
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
        Schema::dropIfExists('stock_opname_data');
    }
}
