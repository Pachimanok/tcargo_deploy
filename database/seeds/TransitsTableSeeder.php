<?php

use Illuminate\Database\Seeder;

class TransitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        DB::table('transits')->insert([
           	'shipping_company_id' => 1,
           	'driver_id' => 1,
            'vehicle_id' => 1,
            'information' => 'Lorem Ipsum is the travel info',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
        DB::table('transits')->insert([
            'shipping_company_id' => 1,
            'driver_id' => 2,
            'vehicle_id' => 1,
            'information' => 'Lorem Ipsum is the travel info',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
        DB::table('transits')->insert([
            'shipping_company_id' => 1,
            'driver_id' => 3,
            'vehicle_id' => 2,
            'information' => 'Lorem Ipsum is the travel info',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
        DB::table('transits')->insert([
            'shipping_company_id' => 1,
            'driver_id' => 2,
            'vehicle_id' => 4,
            'information' => 'Lorem Ipsum is the travel info',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
        DB::table('transits')->insert([
            'shipping_company_id' => 1,
            'driver_id' => 4,
            'vehicle_id' => 2,
            'information' => 'Lorem Ipsum is the travel info',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);        
        DB::table('transits')->insert([
            'shipping_company_id' => 1,
            'driver_id' => 3,
            'vehicle_id' => 1,
            'information' => 'Lorem Ipsum is the travel info',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
        DB::table('transits')->insert([
            'shipping_company_id' => 1,
            'driver_id' => 1,
            'vehicle_id' => 4,
            'information' => 'Lorem Ipsum is the travel info',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
        DB::table('transits')->insert([
            'shipping_company_id' => 1,
            'driver_id' => 1,
            'vehicle_id' => 2,
            'information' => 'Lorem Ipsum is the travel info',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('transits')->insert([
            'shipping_company_id' => 2,
            'driver_id' => 5,
            'vehicle_id' => 5,
            'information' => 'Lorem Ipsum is the travel info',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);        
        DB::table('transits')->insert([
            'shipping_company_id' => 2,
            'driver_id' => 6,
            'vehicle_id' => 6,
            'information' => 'Lorem Ipsum is the travel info',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);        
        DB::table('transits')->insert([
            'shipping_company_id' => 2,
            'driver_id' => 5,
            'vehicle_id' => 7,
            'information' => 'Lorem Ipsum is the travel info',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);        
        DB::table('transits')->insert([
            'shipping_company_id' => 2,
            'driver_id' => 6,
            'vehicle_id' => 5,
            'information' => 'Lorem Ipsum is the travel info',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);        
        DB::table('transits')->insert([
            'shipping_company_id' => 2,
            'driver_id' => 5,
            'vehicle_id' => 6,
            'information' => 'Lorem Ipsum is the travel info',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);                                        

        DB::table('transits')->insert([
            'shipping_company_id' => 3,
            'driver_id' => 7,
            'vehicle_id' => 8,
            'information' => 'Lorem Ipsum is the travel info',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);                                                
        DB::table('transits')->insert([
            'shipping_company_id' => 3,
            'driver_id' => 7,
            'vehicle_id' => 9,
            'information' => 'Lorem Ipsum is the travel info',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);                                                        
        DB::table('transits')->insert([
            'shipping_company_id' => 3,
            'driver_id' => 7,
            'vehicle_id' => 9,
            'information' => 'Lorem Ipsum is the travel info',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);                                                        

        DB::table('transits')->insert([
            'shipping_company_id' => 4,
            'driver_id' => 8,
            'vehicle_id' => 10,
            'information' => 'Lorem Ipsum is the travel info',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);                 
        DB::table('transits')->insert([
            'shipping_company_id' => 4,
            'driver_id' => 11,
            'vehicle_id' => 10,
            'information' => 'Lorem Ipsum is the travel info',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);                         
        DB::table('transits')->insert([
            'shipping_company_id' => 4,
            'driver_id' => 10,
            'vehicle_id' => 10,
            'information' => 'Lorem Ipsum is the travel info',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);                         
        DB::table('transits')->insert([
            'shipping_company_id' => 4,
            'driver_id' => 9,
            'vehicle_id' => 10,
            'information' => 'Lorem Ipsum is the travel info',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);              

        DB::table('transits')->insert([
            'shipping_company_id' => 5,
            'driver_id' => 12,
            'vehicle_id' => 13,
            'information' => 'Lorem Ipsum is the travel info',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);              
        DB::table('transits')->insert([
            'shipping_company_id' => 5,
            'driver_id' => 13,
            'vehicle_id' => 11,
            'information' => 'Lorem Ipsum is the travel info',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);              
        DB::table('transits')->insert([
            'shipping_company_id' => 5,
            'driver_id' => 13,
            'vehicle_id' => 12,
            'information' => 'Lorem Ipsum is the travel info',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);              
        DB::table('transits')->insert([
            'shipping_company_id' => 5,
            'driver_id' => 12,
            'vehicle_id' => 11,
            'information' => 'Lorem Ipsum is the travel info',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    }
}
