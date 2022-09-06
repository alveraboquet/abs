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
        Schema::create('rankings_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('current_ranking')->default(1);
            $table->unsignedBigInteger('new_ranking')->default(1);
            $table->unsignedBigInteger('sponsor_ranking_count')->default(0);
            $table->double('self_sales');
            $table->double('group_sales');
            $table->date('date_entitle')->nullable();
            $table->longText('remarks')->nullable();
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
        Schema::dropIfExists('rankings_logs');
    }
};
