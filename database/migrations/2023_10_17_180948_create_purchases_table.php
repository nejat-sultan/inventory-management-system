<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('PurchaseNo');
            $table->date('PurchaseDate');
            $table->unsignedBigInteger('SupplierID');
            $table->unsignedBigInteger('CategoryID');
            $table->unsignedBigInteger('ProductID');
            $table->integer('Discount');
            $table->integer('Quantity');
            $table->integer('TotalPrice');
            $table->foreign('SupplierID')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreign('CategoryID')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('ProductID')->references('id')->on('products');

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
        Schema::dropIfExists('purchases');
    }
}
