<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id');
            $table->double('original_amount');
            $table->double('processing_fee')->default(0);
            $table->double('actual_amount');
            // $table->string('wallet_type');
            $table->string('trx_type');
            $table->string('status')->default('Pending');

            $table->string('bank_detail')->nullable();
            $table->string('TxID')->nullable();
            $table->string('receipt')->nullable();
            $table->string('remark')->nullable();

            $table->unsignedBigInteger('user_id');

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
        Schema::dropIfExists('payments');
    }
};
