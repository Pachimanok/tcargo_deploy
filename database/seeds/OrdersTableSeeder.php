<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		$now = now();

        DB::table('orders')->insert([
            'user_id' => 1,
            'description' => 'Vasos de vitrio',
            'package_type' => 'box',
            'load_type' => 'regular',
            'load_classes' => '|1|3|',
            'weight' => 231.52,
            'width' => 22.11,
            'height' => 21.33,
            'length' => 11.31,
            'origin_coords' => '-31.438855, -64.217186',
            'origin_master_point_id' => '1',
            'origin' => 'Ñu Pora, 223 - Tomador - Córdoba',
            'destination_coords' => '-34.588532, -58.395874',
            'destination_master_point_id' => '2',
            'destination' => 'Profesor, Mario Campelo - Universidad de Biologia - Recoleta - Buenos Aires',
            'amount' => 100.99,
            'payment_link' => null,
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);


        DB::table('orders')->insert([
            'user_id' => 2,
            'description' => 'Vasos de plastico',
            'package_type' => 'box',
            'load_type' => 'regular',
            'load_classes' => '|1|2|',
            'weight' => 231.52,
            'width' => 22.11,
            'height' => 21.33,
            'length' => 11.31,
            'origin_coords' => '-31.338855, -64.317186',
            'origin_master_point_id' => '3',
            'origin' => 'Ñu Pora, 223 - Tomador - Córdoba',
            'destination_coords' => '-34.588532, -58.395874',
            'destination_master_point_id' => '4',
            'destination' => 'Profesor, Mario Campelo - Universidad de Biologia - Recoleta - Buenos Aires',
            'amount' => 300.99,
            'payment_link' => null,
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);


        DB::table('orders')->insert([
            'user_id' => 2,
            'description' => 'Vasos de madera',
            'package_type' => 'box',
            'load_type' => 'regular',
            'load_classes' => '|2|3|',
            'weight' => 231.52,
            'width' => 22.11,
            'height' => 21.33,
            'length' => 11.31,
            'origin_coords' => '-31.238855, -64.217186',
            'origin_master_point_id' => '5',
            'origin' => 'Ñu Pora, 223 - Tomador - Córdoba',
            'destination_coords' => '-34.588532, -58.395874',
            'destination_master_point_id' => '6',
            'destination' => 'Profesor, Mario Campelo - Universidad de Biologia - Recoleta - Buenos Aires',
            'amount' => 200.99,
            'payment_link' => null,
            'shipping_company_id' => 1,
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);        

    }
}
