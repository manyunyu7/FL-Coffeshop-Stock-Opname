<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutbondLogisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outbond_logistics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_material')->nullable();
            $table->string('count')->nullable();
            $table->unsignedBigInteger('id_opname')->nullable();
            $table->foreign('id_material')->references('id')->on('materials')->onDelete('cascade');
            $table->foreign('id_opname')->references('id')->on('stock_opnames')->onDelete('cascade');
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
        Schema::dropIfExists('outbond_logistics');
    }
}
