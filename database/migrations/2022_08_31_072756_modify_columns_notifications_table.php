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
        Schema::table('notifications', function (Blueprint $table) {
            //
            $table->renameColumn('title', 'title_en');
            $table->renameColumn('content', 'content_en');
            $table->string('title_cn');
            $table->longText('content_cn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notifcations', function (Blueprint $table) {
            //
        });
    }
};
