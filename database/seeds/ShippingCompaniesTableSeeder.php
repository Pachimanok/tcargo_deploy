<?php

use Illuminate\Database\Seeder;

class ShippingCompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		$now = now();

        DB::table('shipping_companies')->insert([
            'user_id' => '1',
            'company_name' => 'Buenos Bienes',
            'social_name' => 'Buenos Cargo INC',
            'fiscal_id_number' => '3388.6655/2221',
            'phone_number' => '8845-88565',
            'phone_number_area_code' => '51',
            'email' => 'buenoscargo@bccinc.artransportes.ar',
            'contact_name' => 'Pedro Quartanilha Sixto',
            //Address Fields
            'city_id' => '333',
            'address_street' => 'Calle Florida',
            'address_number' => '1253',
            'address_complement' => 'B',
            'address_area' => 'Centro',
            'zip_code' => '33345-885',
            'order_fee_percentage' => '10',
            /*
            'operations_center_latitude' => '',
            'operations_center_longitude' => '',
            'operations_center_address' => '',
            'coverage_kilometers' => '1000',
            */
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('shipping_companies')->insert([
            'user_id' => '2',
            'company_name' => 'Shwizz Co',
            'social_name' => 'Shwizz BUNO INC',
            'fiscal_id_number' => '3388.6655/2221',
            'phone_number' => '8845-88565',
            'phone_number_area_code' => '51',
            'email' => 'buenoscargo@bccinc.artransportes.ar',
            'contact_name' => 'Jose Maldonado Alvarez',
            'city_id' => '1253',
            'address_street' => 'Calle Florida',
            'address_number' => '1253',
            'address_complement' => 'B',
            'address_area' => 'Centro',
            'zip_code' => '33345-885',
            'order_fee_percentage' => '10',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);        

        DB::table('shipping_companies')->insert([
            'user_id' => '3',
            'company_name' => 'Argentina Roads',
            'social_name' => 'Argentina Roads',
            'fiscal_id_number' => '3s388.6655/2221',
            'phone_number' => '2312-88565',
            'phone_number_area_code' => '23',
            'email' => 'arroads@arroads.com',
            'contact_name' => 'Augusto Gomide Perez Troy',
            'city_id' => '100',
            'address_street' => 'Calle Alphamedida',
            'address_number' => '5652',
            'address_complement' => 'C',
            'address_area' => 'Centro',
            'zip_code' => '33345-885',
            'order_fee_percentage' => '12',
            'blocked' => '1',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);        

        DB::table('shipping_companies')->insert([
            'user_id' => '4',
            'company_name' => 'Ultra Cargo',
            'social_name' => 'Cargo Ultra',
            'fiscal_id_number' => '8885.6655/2221',
            'phone_number' => '9685-88565',
            'phone_number_area_code' => '53',
            'email' => 'ultraroads@gmail.com',
            'contact_name' => 'Clavino del Royo',
            'city_id' => '200',
            'address_street' => 'Calle Estrella',
            'address_number' => '85',
            'address_area' => 'Quilmes',
            'zip_code' => '8561-885',
            'order_fee_percentage' => '8',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);     

        DB::table('shipping_companies')->insert([
            'user_id' => '5',
            'company_name' => 'Una Cargas',
            'social_name' => 'Cargo Una LTDA',
            'fiscal_id_number' => '8563.6655/2221',
            'phone_number' => '9966-88565',
            'phone_number_area_code' => '11',
            'email' => 'cargouna@gmail.com',
            'contact_name' => 'Arquimedes Drake',
            'city_id' => '122',
            'address_street' => 'Calle Hauai',
            'address_number' => '77',
            'address_area' => 'Informalina',
            'zip_code' => '8563-885',
            'order_fee_percentage' => '10',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);                   

    }
}
