<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shipping_company_id');            
            $table->string("brand");
            $table->string("model");
            $table->integer("type");
            $table->string("plate");
            $table->text("vehicle_load_classes")->nullable(); //Used only in matches |1|,|24| - can be stored in a string with separate values as |1|24|5|
            $table->boolean('satellite_tracking')->default(0);

            /*FILES*/
            $table->string("plate_slip_image_path")->nullable(); //Cedula - Del lado de la patente
            $table->string("registration_image_path")->nullable(); //RUTA - Registro Unico de transporte automotor
            $table->date("registration_expiration_date")->nullable(); 
            $table->string("insurance_image_path")->nullable(); 
            $table->date("insurance_expiration_date")->nullable();   
            $table->string("technical_review_image_path")->nullable(); 
            $table->date("technical_review_expiration_date")->nullable(); 

            /*TRAILER*/
            $table->integer("trailer_type")->nullable();
            $table->string("trailer_plate")->nullable();
            /*TRAILER FILES*/
            $table->string("trailer_plate_slip_image_path")->nullable();
            $table->string("trailer_insurance_image_path")->nullable(); 
            $table->date("trailer_insurance_expiration_date")->nullable(); 
            $table->string("trailer_technical_review_image_path")->nullable(); 
            $table->date("trailer_technical_review_expiration_date")->nullable(); 
    
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
        Schema::dropIfExists('load_classes');
    }
}
