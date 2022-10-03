<?php

use Illuminate\Database\Seeder;

class DriversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        DB::table('drivers')->insert([
           	'shipping_company_id' => 1,
           	'name' => 'Marcos Acosta',
            'birth_date' => '1984-11-15',
            'fiscal_id_number' => '062.689.552-88',
            'professional_id_number' => '12RGS-000099',
            'driver_load_classes' => '|1|3|',

            'city_id' => '333',
            'address_street' => 'Calle Florida',
            'address_number' => '1253',
            'address_complement' => 'B',
            'address_area' => 'Centro',
            'zip_code' => '33345-885',

            'email' => 'driver002@artransportes.ar',
            'phone_number' => '8845-88565',
            'phone_number_area_code' => '51',
            
            

            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('drivers')->insert([
            'shipping_company_id' => 1,
            'name' => 'Joy Montana',
            'birth_date' => '2000-9-9',
            'fiscal_id_number' => '5565.689.552-88',
            'professional_id_number' => 'LLDFL-000099',
            'driver_load_classes' => '|1|4|5|',
            'city_id' => '635',
            'address_street' => 'Goto',
            'address_number' => '21',
            'address_complement' => '2',
            'address_area' => 'Rarelia',
            'zip_code' => '98562-885',
            'email' => 'reactjoy@alphamater.ar',
            'phone_number' => '9653-88565',
            'phone_number_area_code' => '223',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('drivers')->insert([
            'shipping_company_id' => 1,
            'name' => 'Rita Unilopa',
            'birth_date' => '1954-9-9',
            'fiscal_id_number' => '062.689.552-88',
            'professional_id_number' => '12R2GS-000099',
            'driver_load_classes' => '|1|4|',
            'city_id' => '332',
            'address_street' => 'Calle America',
            'address_number' => '563',
            'address_complement' => 'C',
            'address_area' => 'Centro',
            'zip_code' => '33345-885',
            'email' => 'Rita_unilopa@artransportes.ar',
            'phone_number' => '88245-88565',
            'phone_number_area_code' => '516',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('drivers')->insert([
            'shipping_company_id' => 1,
            'name' => 'Casques Marques',
            'birth_date' => '1934-9-9',
            'fiscal_id_number' => '552.689.552-88',
            'professional_id_number' => '09R2GS-000099',
            'driver_load_classes' => '|1|6|',
            'city_id' => '332',
            'address_street' => 'Calle Hermes',
            'address_number' => '563',
            'address_complement' => 'C',
            'address_area' => 'Centro',
            'zip_code' => '33345-885',
            'email' => 'TonyRobbins@ohimgreat.ar',
            'phone_number' => '88245-88565',
            'phone_number_area_code' => '516',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('drivers')->insert([
            'shipping_company_id' => 2,
            'name' => 'Pero Cabral',
            'birth_date' => '1984-11-15',
            'fiscal_id_number' => '062.689.552-88',
            'professional_id_number' => '12RGS-000099',
            'driver_load_classes' => '|1|3|',

            'city_id' => '333',
            'address_street' => 'Calle Florida',
            'address_number' => '1253',
            'address_complement' => 'B',
            'address_area' => 'Centro',
            'zip_code' => '33345-885',

            'email' => 'driver002@artransportes.ar',
            'phone_number' => '8845-88565',
            'phone_number_area_code' => '51',
            
            

            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('drivers')->insert([
            'shipping_company_id' => 2,
            'name' => 'Ignazio Cabral',
            'birth_date' => '1984-11-15',
            'fiscal_id_number' => '062.689.552-88',
            'professional_id_number' => '12RGS-000099',
            'driver_load_classes' => '|1|3|',

            'city_id' => '333',
            'address_street' => 'Calle Florida',
            'address_number' => '1253',
            'address_complement' => 'B',
            'address_area' => 'Centro',
            'zip_code' => '33345-885',

            'email' => 'driver002@artransportes.ar',
            'phone_number' => '8845-88565',
            'phone_number_area_code' => '51',
            
            

            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('drivers')->insert([
            'shipping_company_id' => 3,
            'name' => 'Justo Unico',
            'birth_date' => '1984-5-9',
            'fiscal_id_number' => '856.689.552-88',
            'professional_id_number' => '4562GS-000099',
            'driver_load_classes' => '|2|6|',
            'city_id' => '338',
            'address_street' => 'Calle Trimegister',
            'address_number' => '456',
            'address_area' => 'Recoleta',
            'zip_code' => '33345-852',
            'email' => 'showup@onmyshow.ar',
            'phone_number' => '9856-88565',
            'phone_number_area_code' => '112',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('drivers')->insert([
            'shipping_company_id' => 4,
            'name' => 'Calcino Rodriguez',
            'birth_date' => '1974-8-9',
            'fiscal_id_number' => '999.689.552-88',
            'professional_id_number' => 'ds1GS-000099',
            'driver_load_classes' => '|1|2|',
            'city_id' => '338',
            'address_street' => 'Calle Homero',
            'address_number' => '455',
            'address_area' => 'Blake',
            'zip_code' => '85345-852',
            'email' => 'philosopher@withlobemail.ar',
            'phone_number' => '8552-88565',
            'phone_number_area_code' => '456',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('drivers')->insert([
            'shipping_company_id' => 4,
            'name' => 'Harturo Incognito',
            'birth_date' => '1933-8-9',
            'fiscal_id_number' => '333.689.552-88',
            'professional_id_number' => '3333DS-000099',
            'driver_load_classes' => '|5|2|',
            'city_id' => '841',
            'address_street' => 'Pedro Altino',
            'address_number' => '225',
            'address_area' => 'Altino',
            'zip_code' => '88556-852',
            'email' => 'pedrohermeticcus@gmail.ar',
            'phone_number' => '8562-88565',
            'phone_number_area_code' => '456',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('drivers')->insert([
            'shipping_company_id' => 4,
            'name' => 'Esperito Furton',
            'birth_date' => '1945-2-9',
            'fiscal_id_number' => '253.689.552-88',
            'professional_id_number' => '848DF-000099',
            'driver_load_classes' => '|2|4|',
            'city_id' => '985',
            'address_street' => 'Relecino Crisis',
            'address_number' => '229',
            'address_area' => 'Toolsland',
            'zip_code' => '56325-852',
            'email' => 'ohineedto@driverhappy.ar',
            'phone_number' => '8562-45254',
            'phone_number_area_code' => '225',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('drivers')->insert([
            'shipping_company_id' => 4,
            'name' => 'Henry Cavil',
            'birth_date' => '1855-2-9',
            'fiscal_id_number' => '986.689.552-88',
            'professional_id_number' => 'DE3323-000099',
            'driver_load_classes' => '|1|4|',
            'city_id' => '987',
            'address_street' => 'Opsentee Great',
            'address_number' => '356',
            'address_area' => 'Grumil',
            'zip_code' => '8542-852',
            'email' => 'chipotle@tooimportant.ar',
            'phone_number' => '5874-52523',
            'phone_number_area_code' => '111',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);        

        DB::table('drivers')->insert([
            'shipping_company_id' => 5,
            'name' => 'Horacio Mater',
            'birth_date' => '1986-2-9',
            'fiscal_id_number' => '852.689.552-88',
            'professional_id_number' => 'EE3322-000099',
            'driver_load_classes' => '|1|5|2|',
            'city_id' => '888',
            'address_street' => 'Tchalcoatil',
            'address_number' => '52',
            'address_area' => 'Indino',
            'zip_code' => '9632-852',
            'email' => 'horacio@gmail.com.ar',
            'phone_number' => '21874-52523',
            'phone_number_area_code' => '523',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);        

        DB::table('drivers')->insert([
            'shipping_company_id' => 5,
            'name' => 'Badio Doite',
            'birth_date' => '1999-2-9',
            'fiscal_id_number' => '866.689.552-88',
            'professional_id_number' => '9565DE-000099',
            'driver_load_classes' => '|3|2|1|',
            'city_id' => '852',
            'address_street' => 'Obsequail',
            'address_number' => '11',
            'address_area' => 'Storiandi',
            'zip_code' => '33221-852',
            'email' => 'storidoite@gmail.com',
            'phone_number' => '9653-52523',
            'phone_number_area_code' => '996',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);        

    }

}
