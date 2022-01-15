<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('bills');
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_User');
            $table->foreign('id_User')->references('id')->on('users')->onDelete('cascade');
            $table->string('date_order');
            $table->double('total', 12, 2);
            $table->string('payment');
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
        Schema::dropIfExists('bills');
    }
}
