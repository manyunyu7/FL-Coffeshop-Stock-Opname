<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inbound_logistic', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_supplier')->nullable();
            $table->unsignedBigInteger('id_material')->nullable();
            $table->string('transaction_number')->nullable();
            $table->string('count')->nullable();
            $table->foreign('id_supplier')->references('id')->on('suppliers');
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
        Schema::dropIfExists('inbound_logistic');
    }
}
