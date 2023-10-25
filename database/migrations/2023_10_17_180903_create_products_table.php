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
            $table->string('Name');
            $table->string('Image');
            $table->string('Description');
            $table->unsignedBigInteger('CategoryID');
            $table->unsignedBigInteger('SupplierID');
            $table->string('Barcode');
            $table->integer('UnitPrice');
            $table->unsignedBigInteger('UnitID');
            $table->integer('Stock')->nullable();
            $table->foreign('CategoryID')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('SupplierID')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreign('UnitID')->references('id')->on('units')->onDelete('cascade');

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
        Schema::dropIfExists('products');
    }
}
