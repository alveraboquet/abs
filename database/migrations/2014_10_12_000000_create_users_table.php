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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('full_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone');
            $table->string('password');
            $table->string('security_pin');
            $table->string('country');
            $table->string('province');
            $table->string('referral')->nullable();
            $table->string('hierarchyList')->nullable();
            $table->string('invite_code')->unique();

            $table->unsignedBigInteger('ranking')->default(1);
            $table->double('usdt_wallet')->default(0);
            $table->double('roi_wallet')->default(0);
            $table->double('personal_sales')->default(0);
            $table->double('direct_sales')->default(0);
            $table->double('group_sales')->default(0);

            $table->integer('total_direct')->default(0);
            $table->integer('total_group')->default(0);


            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
};
