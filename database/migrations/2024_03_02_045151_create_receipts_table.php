<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('receipt_id');
            $table->string('CfdiType')->nullable();
            $table->string('Type')->nullable();
            $table->string('Serie')->nullable();
            $table->string('Folio')->nullable();
            $table->string('Date')->nullable();
            $table->string('CertNumber')->nullable();
            $table->string('PaymentTerms')->nullable();
            $table->string('PaymentMethod')->nullable();
            $table->string('PaymentAccountNumber')->nullable();
            $table->string('PaymentBankName')->nullable();
            $table->string('ExpeditionPlace')->nullable();
            $table->string('ExchangeRate')->nullable();
            $table->string('Currency')->nullable();
            $table->string('Subtotal')->nullable();
            $table->string('Discount')->nullable();
            $table->string('Total')->nullable();
            $table->string('Observations')->nullable();
            $table->string('OrderNumber')->nullable();
            $table->json('Issuer')->nullable();
            $table->json('Receiver')->nullable();
            $table->json('Items')->nullable();
            $table->json('Taxes')->nullable();
            $table->json('Complement')->nullable();
            $table->string('Status')->nullable();
            $table->text('OriginalString')->nullable();
            $table->text('pdf')->nullable();
            $table->text('xml')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
