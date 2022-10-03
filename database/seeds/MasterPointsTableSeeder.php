<?php

use Illuminate\Database\Seeder;

class MasterPointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        DB::table('master_points')->insert([
            'name' => 'Córdoba Central',
            'address' => 'Av. Marcelo T. de Alvear 299-341, X5000KGF Córdoba, Argentina',
            'description' => 'Seguir por la carretera central hasta el contorno de la plaza Uno y cambiar de linea para la zona verde.',
            'latitude' => '-31.418711025766',
            'longitude' => '-64.189823493361',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Santa Fé',
            'address' => 'calle 1º de Enero, Santa Fe, Argentina',
            'description' => 'Al Casino Dorado',
            'latitude' => '-31.649266099382',
            'longitude' => '-60.701500751013',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Rosário',
            'address' => 'Bv. Oroño 918, S2000DSW Rosario, Santa Fe, Argentina',
            'description' => 'Amillo',
            'latitude' => '-32.945242063472',
            'longitude' => '-60.653757908538',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Rafaela',
            'address' => 'Bv. Pres. Julio A. Roca 361, S2300GBS Rafaela, Santa Fe, Argentina',
            'description' => 'Chistosa',
            'latitude' => '-31.252048046387',
            'longitude' => '-61.495827529701',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Freyre',
            'address' => 'Bv. 25 de Mayo 235, Freyre, Córdoba, Argentina',
            'description' => 'cool',
            'latitude' => '-31.165077631964',
            'longitude' => '-62.100800501036',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Rio Primero',
            'address' => 'RN19 314, Río Primero, Córdoba, Argentina',
            'description' => 'cool',
            'latitude' => '-31.335283276144',
            'longitude' => '-63.615850609239',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Villa del Rosário',
            'address' => 'Sarmiento, Villa del Rosario, Córdoba, Argentina',
            'description' => 'cool',
            'latitude' => '-31.556775420157',
            'longitude' => '-63.515210326646',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Pilar',
            'address' => 'Juan B. Alberdi 1146, X5972CFY Pilar, Córdoba, Argentina',
            'description' => 'cool',
            'latitude' => '-31.680390942878',
            'longitude' => '-63.880365271155',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Aeropuerto de Cordoba',
            'address' => 'E53, Córdoba, Argentina',
            'description' => 'cool',
            'latitude' => '-31.315843329636',
            'longitude' => '-64.21754629459',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Aeropuerto de Cordoba',
            'address' => 'Suecia 211, 5001 Malagueño, Córdoba, Argentina',
            'description' => 'cool',
            'latitude' => '-31.440939785446',
            'longitude' => '-64.346477262428',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Termas',
            'address' => 'Madrid 71, Villa Carlos Paz, Córdoba, Argentina',
            'description' => 'cool',
            'latitude' => '-31.454668321856',
            'longitude' => '-64.511300325394',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Las Vegas',
            'address' => 'Av. España 121, La Falda, Córdoba, Argentina',
            'description' => 'cool',
            'latitude' => '-31.094613175213',
            'longitude' => '-64.487602402582',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Oncativo',
            'address' => 'Int. Matta 101-149, Oncativo, Córdoba, Argentina',
            'description' => 'cool',
            'latitude' => '-31.915327920437',
            'longitude' => '-63.680441938545',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Bouweer',
            'address' => '9 de Julio, Bouwer, Córdoba, Argentina',
            'description' => 'desc',
            'latitude' => '-31.55792540815',
            'longitude' => '-64.194381518661',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Falda del Carmen',
            'address' => 'Campo, Falda del Carmen, Córdoba, Argentina',
            'description' => 'desc',
            'latitude' => '-31.585983854293',
            'longitude' => '-64.458650563121',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Mendonza',
            'address' => 'Av. Gdor. Ricardo Videla 2900-2998, M5500DPE Mendoza, Argentina',
            'description' => 'Mendonza',
            'latitude' => '-32.893323431434',
            'longitude' => '-68.831232418379',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Villa Dolores',
            'address' => 'Av. San Martín 180, Villa Dolores, Córdoba, Argentina',
            'description' => 'Villa Dolores',
            'latitude' => '-31.948629039858',
            'longitude' => '-65.189281791911',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Quines',
            'address' => 'RN79, San Luis, Argentina',
            'description' => 'Quines',
            'latitude' => '-32.249644364059',
            'longitude' => '-65.806850752419',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Lujan',
            'address' => 'Centenario, Luján, San Luis, Argentina',
            'description' => 'Lujan',
            'latitude' => '-32.366422473431',
            'longitude' => '-65.939188155448',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'La Pampa Grande',
            'address' => 'RN20, San Luis, Argentina',
            'description' => 'La Pampa Grande',
            'latitude' => '-32.337340325994',
            'longitude' => '-66.316636727223',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'San Luis',
            'address' => 'RN146 25, San Luis, Argentina',
            'description' => 'San Luis',
            'latitude' => '-33.311951681999',
            'longitude' => '-66.332012467529',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'La Paz',
            'address' => 'Acceso Este, Mendoza, Argentina',
            'description' => 'La Paz',
            'latitude' => '-33.459312396339',
            'longitude' => '-67.569563332101',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'San Martin',
            'address' => 'Acceso Este, Mendoza, Argentina',
            'description' => 'San Martin',
            'latitude' => '-33.071238541713',
            'longitude' => '-68.454520684715',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Encon',
            'address' => 'RN20, Mendoza, Argentina',
            'description' => 'Encon',
            'latitude' => '-32.216981058865',
            'longitude' => '-67.795761449479',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Rio Cuarto',
            'address' => 'RN A005, Río Cuarto, Córdoba, Argentina',
            'description' => 'Rio Cuarto',
            'latitude' => '-33.110426293282',
            'longitude' => '-64.379888777463',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Vernardo Tuerto',
            'address' => 'Avenida Marcos Ciani, Venado Tuerto, Santa Fe, Argentina',
            'description' => 'Vernardo Tuerto',
            'latitude' => '-33.724833392548',
            'longitude' => '-61.997648801349',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Buenos Aires - Florida',
            'address' => 'Av. Gral. Paz & RN9 & RN A001 & Au Panamericana, Villa Martelli, Buenos Aires, Argentina',
            'description' => 'Buenos Aires - Florida',
            'latitude' => '-34.546509675223',
            'longitude' => '-58.494630970439',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Buenos Aires - Ezeiza',
            'address' => 'Belgrano, Ezeiza, Buenos Aires, Argentina',
            'description' => 'Buenos Aires - Ezeiza',
            'latitude' => '-34.86008236916',
            'longitude' => '-58.562321922114',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Pergamino',
            'address' => 'Av. Hipólito Yrigoyen 1129-1199, Pergamino, Buenos Aires, Argentina',
            'description' => 'Pergamino',
            'latitude' => '-33.898935364431',
            'longitude' => '-60.554810466944',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Vicuna Mackena',
            'address' => 'RN35, Vicuña Mackenna, Córdoba, Argentina',
            'description' => 'Vicuna Mackena',
            'latitude' => '-33.929826401153',
            'longitude' => '-64.397374977925',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Junin',
            'address' => 'RP65, Junín, Buenos Aires, Argentina',
            'description' => 'Junin',
            'latitude' => '-34.582596678344',
            'longitude' => '-60.991979937679',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Villa Maria',
            'address' => 'Bv. España 700-798, Villa María, Córdoba, Argentina',
            'description' => 'Villa Maria',
            'latitude' => '-32.401214170679',
            'longitude' => '-63.245561157654',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'San Juan',
            'address' => 'Av. Circunvalación, San Juan, Argentina',
            'description' => 'San Juan',
            'latitude' => '-31.548606079621',
            'longitude' => '-68.505183767729',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Concórdia',
            'address' => 'RN14, Entre Ríos, Argentina',
            'description' => 'Concórdia',
            'latitude' => '-31.419621452271',
            'longitude' => '-58.103148259484',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Rufino',
            'address' => 'RN7 339, Santa Fe, Argentina',
            'description' => 'Rufino',
            'latitude' => '-34.284378130552',
            'longitude' => '-62.693120521297',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    
        DB::table('master_points')->insert([
            'name' => 'Rioja',
            'address' => 'Av. Félix de la Colina, La Rioja, Argentina',
            'description' => 'Rioja',
            'latitude' => '-29.437986961961',
            'longitude' => '-66.836310440147',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
    


    }
}
