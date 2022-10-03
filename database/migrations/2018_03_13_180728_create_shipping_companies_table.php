<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('company_name', 255);
            $table->string('social_name', 255);
            $table->string('fiscal_id_number', 255);
            $table->integer('city_id')->nullable();
            $table->string('address_street')->nullable();
            $table->string('address_number')->nullable();
            $table->string('address_complement')->nullable();
            $table->string('address_area')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('phone_number', 24)->nullable();
            $table->string('phone_number_area_code')->nullable();
            $table->string('email', 191);
            $table->string('contact_name', 255);
            $table->integer('order_fee_percentage')->default(10);
            $table->boolean('blocked')->default(0);
            /*
            $table->text('operations_center_address');
            $table->string('operations_center_latitude')->nullable();
            $table->string('operations_center_longitude')->nullable();
            $table->integer('coverage_kilometers');
            */
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
        Schema::dropIfExists('shipping_companies');
    }
}
