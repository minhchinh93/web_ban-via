<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('IdFB')->nullable();
                $table->unsignedBigInteger('id_type');
                $table->foreign('id_type')->references('id')->on('type_products')->onDelete('cascade');
                $table->longText('pasword')->nullable();
                $table->string('email')->nullable();
                $table->string('passmail')->nullable();
                $table->string('fa')->nullable();
                $table->string('status')->default('live')->nullable();
                $table->string('new')->nullable();
                $table->timestamps();
                $table->softDeletes(); // add

            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
