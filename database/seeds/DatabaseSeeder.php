<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User types root and example user
        $this->call(UserTypesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        //Master Data
        $this->call(LoadClassesTableSeeder::class); // Load Classes
        $this->call(MasterPointsTableSeeder::class); //Master Points
        
        //Shipping companies - Vehicles & Drivers
        $this->call(ShippingCompaniesTableSeeder::class);
        $this->call(VehiclesTableSeeder::class);
        $this->call(DriversTableSeeder::class);

        $this->call(TransitsTableSeeder::class);        
        $this->call(CheckpointsTableSeeder::class);        

        
        $this->call(OrdersTableSeeder::class);

        //ATTENTION - This uses SQL files to seed Countries, States and Cities.
        $this->call(CountriesTableSeeder::class); // Countries, States and Cities
    }
}
