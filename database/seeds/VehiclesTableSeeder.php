<?php

use Illuminate\Database\Seeder;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        DB::table('vehicles')->insert([
           	'shipping_company_id' => 1,
           	'brand' => 'Ford',
            'model' => 'F12000',
            'type' => 2,
            'plate' => 'RGB-000099',
            'vehicle_load_classes' => '|1|3|',
            'satellite_tracking' => '0',
            'registration_expiration_date' => '2018-10-14', 
            'insurance_expiration_date' => '2018-11-21', 
            'technical_review_expiration_date' => '2018-11-12', 
            'trailer_type' => '1',
            'trailer_plate' => 'RES-88556699',
            'trailer_insurance_expiration_date' => '2018-12-31', 
            'trailer_technical_review_expiration_date' => '2018-12-23', 
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('vehicles')->insert([
            'shipping_company_id' => 1,
            'brand' => 'Chevrolet',
            'model' => 'TruckPower',
            'type' => 2,
            'plate' => 'RGB-558866',
            'vehicle_load_classes' => '|1|3|5|',
            'satellite_tracking' => '1',
            'registration_expiration_date' => '2018-10-14', 
            'insurance_expiration_date' => '2018-11-21', 
            'technical_review_expiration_date' => '2018-11-12', 
            'trailer_type' => '1',
            'trailer_plate' => 'YYM-552256',
            'trailer_insurance_expiration_date' => '2018-12-31', 
            'trailer_technical_review_expiration_date' => '2018-12-23', 
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('vehicles')->insert([
            'shipping_company_id' => 1,
            'brand' => 'Chevrolet',
            'model' => 'TruckPower',
            'type' => 2,
            'plate' => 'ERT-998866',
            'vehicle_load_classes' => '|1|3|5|',
            'satellite_tracking' => '1',
            'registration_expiration_date' => '2018-10-14', 
            'insurance_expiration_date' => '2018-11-21', 
            'technical_review_expiration_date' => '2018-11-12', 
            'trailer_type' => '1',
            'trailer_plate' => 'RES-88556699',
            'trailer_insurance_expiration_date' => '2018-12-31', 
            'trailer_technical_review_expiration_date' => '2018-12-23', 
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('vehicles')->insert([
            'shipping_company_id' => 1,
            'brand' => 'Volvo',
            'model' => 'GGF',
            'type' => 2,
            'plate' => 'RGB-0332099',
            'vehicle_load_classes' => '|1|3|',
            'satellite_tracking' => '0',
            'registration_expiration_date' => '2018-10-14', 
            'insurance_expiration_date' => '2018-11-21', 
            'technical_review_expiration_date' => '2018-11-12', 
            'trailer_type' => '1',
            'trailer_plate' => 'RES-88556699',
            'trailer_insurance_expiration_date' => '2018-12-31', 
            'trailer_technical_review_expiration_date' => '2018-12-23', 
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('vehicles')->insert([
            'shipping_company_id' => 2,
            'brand' => 'Chevrolet',
            'model' => 'Landmark',
            'type' => 2,
            'plate' => 'YHK-0ff099',
            'vehicle_load_classes' => '|1|3|',
            'satellite_tracking' => '0',
            'registration_expiration_date' => '2018-10-14', 
            'insurance_expiration_date' => '2018-11-21', 
            'technical_review_expiration_date' => '2018-11-12', 
            'trailer_type' => '1',
            'trailer_plate' => 'RES-88556699',
            'trailer_insurance_expiration_date' => '2018-12-31', 
            'trailer_technical_review_expiration_date' => '2018-12-23', 
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('vehicles')->insert([
            'shipping_company_id' => 2,
            'brand' => 'MarkVI',
            'model' => 'AlphaRock',
            'type' => 2,
            'plate' => 'RGB-323232',
            'vehicle_load_classes' => '|1|3|',
            'satellite_tracking' => '0',
            'registration_expiration_date' => '2018-10-14', 
            'insurance_expiration_date' => '2018-11-21', 
            'technical_review_expiration_date' => '2018-11-12', 
            'trailer_type' => '1',
            'trailer_plate' => 'RES-88556699',
            'trailer_insurance_expiration_date' => '2018-12-31', 
            'trailer_technical_review_expiration_date' => '2018-12-23', 
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('vehicles')->insert([
            'shipping_company_id' => 2,
            'brand' => 'MarkVI',
            'model' => 'AlphaRock',
            'type' => 2,
            'plate' => '988-323232',
            'vehicle_load_classes' => '|1|3|4|',
            'satellite_tracking' => '1',
            'registration_expiration_date' => '2018-10-14', 
            'insurance_expiration_date' => '2018-11-21', 
            'technical_review_expiration_date' => '2018-11-12', 
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('vehicles')->insert([
            'shipping_company_id' => 3,
            'brand' => 'Chevrolet',
            'model' => 'AlphaRockII',
            'type' => 1,
            'plate' => '852-323232',
            'vehicle_load_classes' => '|1|3|',
            'satellite_tracking' => '0',
            'registration_expiration_date' => '2018-10-14', 
            'insurance_expiration_date' => '2018-11-21', 
            'technical_review_expiration_date' => '2018-11-12', 
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);        

        DB::table('vehicles')->insert([
            'shipping_company_id' => 3,
            'brand' => 'Volkswagen',
            'model' => 'VWTruck',
            'type' => 3,
            'plate' => '562-323232',
            'vehicle_load_classes' => '|1|2|',
            'satellite_tracking' => '1',
            'registration_expiration_date' => '2018-10-14', 
            'insurance_expiration_date' => '2018-11-21', 
            'technical_review_expiration_date' => '2018-11-12', 
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);                

        DB::table('vehicles')->insert([
            'shipping_company_id' => 4,
            'brand' => 'Volkswagen',
            'model' => 'VWTruck',
            'type' => 2,
            'plate' => '856-323232',
            'vehicle_load_classes' => '|3|2|',
            'satellite_tracking' => '0',
            'registration_expiration_date' => '2018-10-14', 
            'insurance_expiration_date' => '2018-11-21', 
            'technical_review_expiration_date' => '2018-11-12', 
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);                

        DB::table('vehicles')->insert([
            'shipping_company_id' => 5,
            'brand' => 'Fiat',
            'model' => 'Pop212',
            'type' => 3,
            'plate' => '866-323232',
            'vehicle_load_classes' => '|1|2|',
            'satellite_tracking' => '1',
            'registration_expiration_date' => '2018-10-14', 
            'insurance_expiration_date' => '2018-11-21', 
            'technical_review_expiration_date' => '2018-11-12', 
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);                        

        DB::table('vehicles')->insert([
            'shipping_company_id' => 5,
            'brand' => 'Ubertrucks',
            'model' => 'U22',
            'type' => 1,
            'plate' => 'RRF-323232',
            'vehicle_load_classes' => '|1|4|',
            'satellite_tracking' => '0',
            'registration_expiration_date' => '2018-10-14', 
            'insurance_expiration_date' => '2018-11-21', 
            'technical_review_expiration_date' => '2018-11-12', 
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);                        

        DB::table('vehicles')->insert([
            'shipping_company_id' => 5,
            'brand' => 'Ubertrucks',
            'model' => 'U23',
            'type' => 2,
            'plate' => 'RRF-5654622',
            'vehicle_load_classes' => '|3|4|',
            'satellite_tracking' => '1',
            'registration_expiration_date' => '2018-10-14', 
            'insurance_expiration_date' => '2018-11-21', 
            'technical_review_expiration_date' => '2018-11-12', 
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);                        

    }
}
