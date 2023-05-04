<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rop', function (Blueprint $table) {
            $table->increments('id_rop');
            $table->integer('total_penjualan')->default(0);
            $table->integer('total_hari_penjualan')->default(0);
            $table->integer('demand')->default(0);
            $table->integer('lead_time')->default(0);
            $table->integer('safety_stock')->default(0);
            $table->integer('reorder_point')->default(0);
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
        Schema::dropIfExists('rop');
    }
}
