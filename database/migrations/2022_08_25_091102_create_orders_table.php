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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->unsignedBigInteger('user_id');
            $table->double('amount');
            $table->double('float_amount');
            $table->double('total_profit')->default(0);
            $table->double('total_percentage')->default(0);

            $table->string('status')->default('Pending');
            $table->date('date_apply');
            $table->date('date_activate')->nullable();
            $table->date('date_cancel')->nullable();
            $table->date('date_end')->nullable();
            $table->integer('duration')->nullable();


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
        Schema::dropIfExists('orders');
    }
};
