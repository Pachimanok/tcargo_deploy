<?php

use Illuminate\Database\Seeder;

class LoadClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$now = now();

        DB::table('load_classes')->insert([
           	'name' => 'Combustible',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

		DB::table('load_classes')->insert([
           	'name' => 'Carga Viva',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);        

        DB::table('load_classes')->insert([
           	'name' => 'Refrigerados',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('load_classes')->insert([
           	'name' => 'Líquidos',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('load_classes')->insert([
           	'name' => 'Contaminantes',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    }
}
