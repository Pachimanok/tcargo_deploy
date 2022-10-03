<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email', 191)->unique();
            $table->string('password');
            $table->string('user_type_reference')->default('standard');
            $table->string('phone_number', 24)->nullable();
            $table->string('phone_number_area_code')->nullable();
            $table->string('social_name')->nullable();
            $table->string('ssid')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('address_street')->nullable();
            $table->string('address_number')->nullable();
            $table->string('address_complement')->nullable();
            $table->string('address_area')->nullable();
            $table->string('zip_code')->nullable();
            $table->boolean('tos_accepted')->default(0);
            $table->boolean('blocked')->default(0);

            $table->rememberToken();
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
}
