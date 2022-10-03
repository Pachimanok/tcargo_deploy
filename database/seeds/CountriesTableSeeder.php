<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        $path = 'database/seeds/sql_files/countries_and_states.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Countries and table seeded!');

        $argentina_cities = 'database/seeds/sql_files/argentina_cities.sql';
        DB::unprepared(file_get_contents($argentina_cities));
        $this->command->info('Argentina cities seeded!');

        $chile_cities = 'database/seeds/sql_files/chile_cities.sql';
        DB::unprepared(file_get_contents($chile_cities));        
        $this->command->info('Chile cities seeded!');

        $brasil_cities = 'database/seeds/sql_files/brasil_cities.sql';
        DB::unprepared(file_get_contents($brasil_cities));                
        $this->command->info('Brasil cities seeded!');

    }
}
