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
        Schema::create('rankings', function (Blueprint $table) {
            $table->id();
            //$table->integer('level')->default(1);
            $table->string('name_en');
            $table->string('name_cn');
            $table->integer('min_group')->default(0);
            $table->integer('min_sponsor')->default(0);
            $table->integer('sponsor_ranking')->default(0);
            $table->integer('sponsor_ranking_count')->default(0);
            $table->double('min_group_sales')->default(0);
            $table->double('min_direct_sales')->default(0);
            $table->double('min_self_sales')->default(0);
            $table->double('bonus')->default(0);
            $table->double('same_level_bonus')->default(0);
            $table->double('group_performance_bonus')->default(0);
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('rankings');
    }
};
