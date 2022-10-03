<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shipping_company_id')->unsigned();
            $table->integer('user_id')->nullable();

            $table->string('name', 255);
            $table->date('birth_date', 255);
            $table->string('fiscal_id_number', 255)->nullable(); //DNI

            $table->string('professional_id_number', 255)->nullable(); //CUIT O CUIL
            $table->text("driver_load_classes")->nullable(); //Used only in matches |1|,|24| - can be stored in a string with separate values as |1|24|5|

            $table->integer('city_id')->nullable();
            $table->string('address_street')->nullable();
            $table->string('address_number')->nullable();
            $table->string('address_complement')->nullable();
            $table->string('address_area')->nullable();
            $table->string('zip_code')->nullable(); 

            $table->string('email', 191)->nullable();
            $table->string('phone_number', 24)->nullable();
            $table->string('phone_number_area_code')->nullable();       

            $table->string("license_image_path")->nullable(); 
            $table->string("medical_license_image_path")->nullable(); 
            $table->string("special_license_image_path")->nullable(); 
            $table->string("health_license_image_path")->nullable(); 

            $table->softDeletes();
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
        Schema::dropIfExists('drivers');
    }
}
