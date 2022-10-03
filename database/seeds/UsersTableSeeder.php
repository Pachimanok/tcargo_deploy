<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		$now = now();

        DB::table('users')->insert([
            'name' => 'Valeria Administra',
            'email' => 'admin@tcargo.com',
            'password' => bcrypt('123456'),
            'tos_accepted' => 1,
            'user_type_reference' => 'admin',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('users')->insert([
            'name' => 'Pericles Paciente',
            'email' => 'pcp@gmail.com',
            'phone_number' => '98232123',
            'phone_number_area_code' => '12',
            'tos_accepted' => 1,
            'password' => bcrypt('123456'),
            'user_type_reference' => 'standard',
            'created_at' => '2018-01-22 21:22:45',
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('users')->insert([
            'name' => 'Castelvania Gomide',
            'email' => 'cgcg332@alphabet.inc',
            'phone_number' => '98232123',
            'phone_number_area_code' => '12',
            'tos_accepted' => 0,
            'password' => bcrypt('123456'),
            'user_type_reference' => 'standard',
            'created_at' => '2018-01-02 22:11:09',
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('users')->insert([
            'name' => 'Americo Zumo',
            'email' => 'zummmmo@aol.com',
            'phone_number' => '98232123',
            'phone_number_area_code' => '12',
            'tos_accepted' => 1,
            'blocked' => 1,
            'password' => bcrypt('123456'),
            'user_type_reference' => 'standard',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('users')->insert([
            'name' => 'Pedro Cerrero',
            'email' => 'pccarr@aol.com',
            'phone_number' => '(122)98232123',
            'phone_number_area_code' => '10',
            'tos_accepted' => 1,
            'password' => bcrypt('123456'),
            'user_type_reference' => 'standard',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('users')->insert([
            'name' => 'Manoel Cerrero',
            'email' => 'mccarr@aol.com',
            'phone_number' => '98232123',
            'phone_number_area_code' => '10',
            'tos_accepted' => 0,
            'password' => bcrypt('123456'),
            'user_type_reference' => 'standard',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);

        DB::table('users')->insert([
            'name' => 'Apenea Perez',
            'email' => 'apaenea@unatransp.com',
            'phone_number' => '(122)98232123',
            'phone_number_area_code' => '10',
            'tos_accepted' => 1,
            'password' => bcrypt('123456'),
            'user_type_reference' => 'standard',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);        

        DB::table('users')->insert([
            'name' => 'Augusto Nobre',
            'email' => 'augusto23@gmail.com',
            'phone_number' => '3323332123',
            'phone_number_area_code' => '10',
            'tos_accepted' => 1,
            'password' => bcrypt('123456'),
            'user_type_reference' => 'standard',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);      

        DB::table('users')->insert([
            'name' => 'Carilho Prieto',
            'email' => 'jovenesunidos@gmail.com',
            'phone_number' => '5588-88655',
            'phone_number_area_code' => '102',
            'tos_accepted' => 1,
            'password' => bcrypt('123456'),
            'user_type_reference' => 'standard',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);      

        DB::table('users')->insert([
            'name' => 'Marcela Edith',
            'email' => 'edithsin@atadurasar.com',
            'phone_number' => '8569-78785',
            'phone_number_area_code' => '802',
            'tos_accepted' => 0,
            'password' => bcrypt('123456'),
            'user_type_reference' => 'standard',
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);              

   	}
}
