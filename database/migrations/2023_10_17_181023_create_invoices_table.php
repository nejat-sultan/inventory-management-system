<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('InvoiceNo');
            $table->date('Date');
            $table->unsignedBigInteger('CategoryID');
            $table->unsignedBigInteger('ProductID');
            $table->integer('Quantity');
            $table->unsignedBigInteger('CustomerID');
            $table->string('PaidStatus');
            $table->integer('Amount');
            $table->foreign('CustomerID')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('CategoryID')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('ProductID')->references('id')->on('products')->onDelete('cascade');

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
        Schema::dropIfExists('invoices');
    }
}
