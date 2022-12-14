<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('purchaseds');
        Schema::create('purchaseds', function (Blueprint $table) {
            $table->unsignedBigInteger('id_User');
            $table->foreign('id_User')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');

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
        Schema::dropIfExists('purchaseds');
    }
}
