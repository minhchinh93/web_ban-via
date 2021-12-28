<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillDetaillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_detaills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_bill');
            $table->foreign('id_bill')->references('id')->on('bills');
            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')->references('id')->on('products');
            $table->float('quantity');
            $table->float('price');
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
        Schema::dropIfExists('bill_detaills');
    }
}
