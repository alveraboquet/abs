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
        Schema::create('bonus_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ranking')->default(1);
            $table->string('order_id')->nullable();
            $table->string('bonus_type')->nullable();
            $table->double('amount')->nullable();
            $table->double('bonus_percentage')->nullable();
            $table->double('net_bonus')->nullable();
            $table->date('date_entitle')->nullable();

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
        Schema::dropIfExists('bonus_histories');
    }
};
