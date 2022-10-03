<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('description', 255);
            $table->string('package_type', 128);
            $table->string('load_type', 128);
            $table->string('load_classes')->nullable();
   
            $table->float('weight', 8, 2)->nullable();
            $table->float('width', 8, 2)->nullable();
            $table->float('height', 8, 2)->nullable();
            $table->float('length', 8, 2)->nullable();     
            $table->text('origin');
            $table->string('origin_coords', 255);
            $table->integer('origin_master_point_id');
            $table->dateTime('origin_period_start')->nullable();
            $table->dateTime('origin_period_end')->nullable();
            $table->boolean('origin_period_night')->default(0);
            $table->text('origin_notes')->nullable();
            $table->text('destination');
            $table->string('destination_coords', 255);
            $table->integer('destination_master_point_id');
            $table->dateTime('destination_period_start')->nullable();
            $table->dateTime('destination_period_end')->nullable();
            $table->boolean('destination_period_night')->default(0);
            $table->text('destination_notes')->nullable();
            $table->float('amount', 8, 2);
        
            $table->text('user_notes')->nullable();   

            $table->integer('shipping_company_id')->unsigned()->nullable();
            $table->dateTime('completed')->nullable();
            $table->string('payment_link', 255)->nullable();
            $table->string('payment_status', 255)->nullable();
            $table->dateTime('paid')->nullable();
            $table->dateTime('withdrawal')->nullable();

            $table->text('payment_results')->nullable();   

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');


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
}
