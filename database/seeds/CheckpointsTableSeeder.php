<?php

use Illuminate\Database\Seeder;

class CheckpointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        DB::table('checkpoints')->insert([
            'transit_id' => '1',
            'master_point_id' => '3',
            'sort' => '1',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '1',
            'master_point_id' => '2',
            'sort' => '2',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '1',
            'master_point_id' => '4',
            'sort' => '3',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '1',
            'master_point_id' => '5',
            'sort' => '4',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '1',
            'master_point_id' => '6',
            'sort' => '5',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '1',
            'master_point_id' => '7',
            'sort' => '6',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '1',
            'master_point_id' => '8',
            'sort' => '7',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '1',
            'master_point_id' => '13',
            'sort' => '8',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '2',
            'master_point_id' => '13',
            'sort' => '1',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '2',
            'master_point_id' => '7',
            'sort' => '2',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '2',
            'master_point_id' => '6',
            'sort' => '3',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '2',
            'master_point_id' => '1',
            'sort' => '4',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '2',
            'master_point_id' => '14',
            'sort' => '5',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '3',
            'master_point_id' => '12',
            'sort' => '1',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '3',
            'master_point_id' => '11',
            'sort' => '2',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '3',
            'master_point_id' => '10',
            'sort' => '3',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '3',
            'master_point_id' => '1',
            'sort' => '4',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '3',
            'master_point_id' => '15',
            'sort' => '5',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '3',
            'master_point_id' => '8',
            'sort' => '6',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '4',
            'master_point_id' => '15',
            'sort' => '1',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '4',
            'master_point_id' => '14',
            'sort' => '2',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '4',
            'master_point_id' => '1',
            'sort' => '3',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '4',
            'master_point_id' => '6',
            'sort' => '4',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '4',
            'master_point_id' => '7',
            'sort' => '5',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '4',
            'master_point_id' => '5',
            'sort' => '6',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '4',
            'master_point_id' => '4',
            'sort' => '7',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '4',
            'master_point_id' => '2',
            'sort' => '8',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '5',
            'master_point_id' => '12',
            'sort' => '1',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '5',
            'master_point_id' => '9',
            'sort' => '2',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '5',
            'master_point_id' => '1',
            'sort' => '3',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '5',
            'master_point_id' => '8',
            'sort' => '4',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '5',
            'master_point_id' => '7',
            'sort' => '5',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '5',
            'master_point_id' => '5',
            'sort' => '6',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '5',
            'master_point_id' => '4',
            'sort' => '7',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '6',
            'master_point_id' => '6',
            'sort' => '1',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '6',
            'master_point_id' => '7',
            'sort' => '2',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '6',
            'master_point_id' => '8',
            'sort' => '3',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '6',
            'master_point_id' => '14',
            'sort' => '4',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '6',
            'master_point_id' => '1',
            'sort' => '5',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '6',
            'master_point_id' => '10',
            'sort' => '6',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '6',
            'master_point_id' => '11',
            'sort' => '7',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '6',
            'master_point_id' => '9',
            'sort' => '8',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '6',
            'master_point_id' => '1',
            'sort' => '9',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '6',
            'master_point_id' => '6',
            'sort' => '10',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '7',
            'master_point_id' => '3',
            'sort' => '1',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '7',
            'master_point_id' => '13',
            'sort' => '2',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '7',
            'master_point_id' => '8',
            'sort' => '3',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '7',
            'master_point_id' => '7',
            'sort' => '4',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '7',
            'master_point_id' => '6',
            'sort' => '5',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '7',
            'master_point_id' => '1',
            'sort' => '6',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '7',
            'master_point_id' => '10',
            'sort' => '7',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '7',
            'master_point_id' => '11',
            'sort' => '8',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '7',
            'master_point_id' => '15',
            'sort' => '9',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '8',
            'master_point_id' => '15',
            'sort' => '1',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '8',
            'master_point_id' => '11',
            'sort' => '2',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '8',
            'master_point_id' => '10',
            'sort' => '3',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '8',
            'master_point_id' => '1',
            'sort' => '4',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '8',
            'master_point_id' => '9',
            'sort' => '5',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '8',
            'master_point_id' => '6',
            'sort' => '6',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '8',
            'master_point_id' => '7',
            'sort' => '7',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '8',
            'master_point_id' => '8',
            'sort' => '8',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '13',
            'master_point_id' => '6',
            'sort' => '1',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '13',
            'master_point_id' => '7',
            'sort' => '2',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '9',
            'master_point_id' => '2',
            'sort' => '1',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '9',
            'master_point_id' => '4',
            'sort' => '2',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '9',
            'master_point_id' => '5',
            'sort' => '3',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '9',
            'master_point_id' => '6',
            'sort' => '4',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '9',
            'master_point_id' => '7',
            'sort' => '5',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '9',
            'master_point_id' => '8',
            'sort' => '6',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '9',
            'master_point_id' => '13',
            'sort' => '7',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '9',
            'master_point_id' => '32',
            'sort' => '8',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '9',
            'master_point_id' => '25',
            'sort' => '9',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '9',
            'master_point_id' => '26',
            'sort' => '10',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '9',
            'master_point_id' => '29',
            'sort' => '11',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '9',
            'master_point_id' => '27',
            'sort' => '12',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '10',
            'master_point_id' => '16',
            'sort' => '1',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '10',
            'master_point_id' => '23',
            'sort' => '2',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '10',
            'master_point_id' => '22',
            'sort' => '3',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '10',
            'master_point_id' => '21',
            'sort' => '4',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '10',
            'master_point_id' => '25',
            'sort' => '5',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '10',
            'master_point_id' => '26',
            'sort' => '6',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '10',
            'master_point_id' => '29',
            'sort' => '7',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '10',
            'master_point_id' => '27',
            'sort' => '8',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '10',
            'master_point_id' => '28',
            'sort' => '9',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '11',
            'master_point_id' => '16',
            'sort' => '1',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '11',
            'master_point_id' => '23',
            'sort' => '2',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '11',
            'master_point_id' => '22',
            'sort' => '3',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '11',
            'master_point_id' => '21',
            'sort' => '4',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '11',
            'master_point_id' => '19',
            'sort' => '5',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '11',
            'master_point_id' => '18',
            'sort' => '6',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '11',
            'master_point_id' => '17',
            'sort' => '7',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '11',
            'master_point_id' => '11',
            'sort' => '8',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '11',
            'master_point_id' => '10',
            'sort' => '9',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '11',
            'master_point_id' => '1',
            'sort' => '10',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '12',
            'master_point_id' => '33',
            'sort' => '1',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '12',
            'master_point_id' => '24',
            'sort' => '2',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '12',
            'master_point_id' => '20',
            'sort' => '3',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '12',
            'master_point_id' => '19',
            'sort' => '4',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '12',
            'master_point_id' => '18',
            'sort' => '5',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '12',
            'master_point_id' => '17',
            'sort' => '6',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '12',
            'master_point_id' => '15',
            'sort' => '7',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '12',
            'master_point_id' => '14',
            'sort' => '8',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '12',
            'master_point_id' => '6',
            'sort' => '9',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '12',
            'master_point_id' => '2',
            'sort' => '10',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '13',
            'master_point_id' => '8',
            'sort' => '3',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '13',
            'master_point_id' => '13',
            'sort' => '4',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '13',
            'master_point_id' => '32',
            'sort' => '5',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '13',
            'master_point_id' => '25',
            'sort' => '6',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '13',
            'master_point_id' => '26',
            'sort' => '7',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '13',
            'master_point_id' => '29',
            'sort' => '8',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '13',
            'master_point_id' => '31',
            'sort' => '9',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '13',
            'master_point_id' => '28',
            'sort' => '10',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '14',
            'master_point_id' => '34',
            'sort' => '1',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '14',
            'master_point_id' => '2',
            'sort' => '2',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '14',
            'master_point_id' => '3',
            'sort' => '3',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '14',
            'master_point_id' => '29',
            'sort' => '4',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '14',
            'master_point_id' => '27',
            'sort' => '5',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '14',
            'master_point_id' => '31',
            'sort' => '6',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '14',
            'master_point_id' => '35',
            'sort' => '7',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '14',
            'master_point_id' => '30',
            'sort' => '8',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '14',
            'master_point_id' => '25',
            'sort' => '9',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '14',
            'master_point_id' => '21',
            'sort' => '10',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '14',
            'master_point_id' => '22',
            'sort' => '11',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '14',
            'master_point_id' => '23',
            'sort' => '12',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '15',
            'master_point_id' => '16',
            'sort' => '1',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '15',
            'master_point_id' => '23',
            'sort' => '2',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '15',
            'master_point_id' => '22',
            'sort' => '3',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '15',
            'master_point_id' => '21',
            'sort' => '4',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '15',
            'master_point_id' => '30',
            'sort' => '5',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '15',
            'master_point_id' => '35',
            'sort' => '6',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '15',
            'master_point_id' => '31',
            'sort' => '7',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '15',
            'master_point_id' => '28',
            'sort' => '8',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '15',
            'master_point_id' => '27',
            'sort' => '9',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '15',
            'master_point_id' => '29',
            'sort' => '10',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '15',
            'master_point_id' => '26',
            'sort' => '11',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '15',
            'master_point_id' => '3',
            'sort' => '12',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '15',
            'master_point_id' => '2',
            'sort' => '13',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '15',
            'master_point_id' => '4',
            'sort' => '14',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '16',
            'master_point_id' => '1',
            'sort' => '1',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '16',
            'master_point_id' => '10',
            'sort' => '2',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '16',
            'master_point_id' => '11',
            'sort' => '3',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '16',
            'master_point_id' => '17',
            'sort' => '4',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '16',
            'master_point_id' => '18',
            'sort' => '5',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '16',
            'master_point_id' => '19',
            'sort' => '6',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '16',
            'master_point_id' => '21',
            'sort' => '7',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '16',
            'master_point_id' => '30',
            'sort' => '8',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '16',
            'master_point_id' => '35',
            'sort' => '9',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '16',
            'master_point_id' => '26',
            'sort' => '10',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '16',
            'master_point_id' => '3',
            'sort' => '11',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '16',
            'master_point_id' => '2',
            'sort' => '12',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '17',
            'master_point_id' => '34',
            'sort' => '1',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '17',
            'master_point_id' => '2',
            'sort' => '2',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '17',
            'master_point_id' => '4',
            'sort' => '3',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '17',
            'master_point_id' => '5',
            'sort' => '4',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '17',
            'master_point_id' => '6',
            'sort' => '5',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '17',
            'master_point_id' => '1',
            'sort' => '6',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '17',
            'master_point_id' => '9',
            'sort' => '7',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '17',
            'master_point_id' => '12',
            'sort' => '8',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '17',
            'master_point_id' => '11',
            'sort' => '9',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '17',
            'master_point_id' => '17',
            'sort' => '10',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '17',
            'master_point_id' => '18',
            'sort' => '11',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '17',
            'master_point_id' => '19',
            'sort' => '12',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '17',
            'master_point_id' => '20',
            'sort' => '13',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '17',
            'master_point_id' => '24',
            'sort' => '14',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '17',
            'master_point_id' => '33',
            'sort' => '15',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '18',
            'master_point_id' => '16',
            'sort' => '1',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '18',
            'master_point_id' => '23',
            'sort' => '2',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '18',
            'master_point_id' => '22',
            'sort' => '3',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '18',
            'master_point_id' => '21',
            'sort' => '4',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '18',
            'master_point_id' => '30',
            'sort' => '5',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '18',
            'master_point_id' => '35',
            'sort' => '6',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '18',
            'master_point_id' => '31',
            'sort' => '7',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '18',
            'master_point_id' => '28',
            'sort' => '8',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '18',
            'master_point_id' => '27',
            'sort' => '9',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '18',
            'master_point_id' => '29',
            'sort' => '10',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '18',
            'master_point_id' => '26',
            'sort' => '11',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '18',
            'master_point_id' => '3',
            'sort' => '12',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '18',
            'master_point_id' => '32',
            'sort' => '13',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '18',
            'master_point_id' => '25',
            'sort' => '14',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '18',
            'master_point_id' => '14',
            'sort' => '15',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '18',
            'master_point_id' => '1',
            'sort' => '16',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '18',
            'master_point_id' => '9',
            'sort' => '17',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '18',
            'master_point_id' => '12',
            'sort' => '18',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '19',
            'master_point_id' => '34',
            'sort' => '1',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '19',
            'master_point_id' => '2',
            'sort' => '2',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '19',
            'master_point_id' => '4',
            'sort' => '3',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '19',
            'master_point_id' => '5',
            'sort' => '4',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '19',
            'master_point_id' => '6',
            'sort' => '5',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '19',
            'master_point_id' => '7',
            'sort' => '6',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '19',
            'master_point_id' => '8',
            'sort' => '7',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '19',
            'master_point_id' => '13',
            'sort' => '8',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '19',
            'master_point_id' => '32',
            'sort' => '9',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '19',
            'master_point_id' => '3',
            'sort' => '10',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '19',
            'master_point_id' => '26',
            'sort' => '11',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '19',
            'master_point_id' => '29',
            'sort' => '12',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '19',
            'master_point_id' => '27',
            'sort' => '13',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '20',
            'master_point_id' => '16',
            'sort' => '1',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '20',
            'master_point_id' => '23',
            'sort' => '2',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '20',
            'master_point_id' => '22',
            'sort' => '3',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '20',
            'master_point_id' => '21',
            'sort' => '4',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '20',
            'master_point_id' => '30',
            'sort' => '5',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '20',
            'master_point_id' => '35',
            'sort' => '6',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '20',
            'master_point_id' => '31',
            'sort' => '7',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '20',
            'master_point_id' => '28',
            'sort' => '8',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '21',
            'master_point_id' => '34',
            'sort' => '1',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '21',
            'master_point_id' => '2',
            'sort' => '2',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '21',
            'master_point_id' => '4',
            'sort' => '3',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '21',
            'master_point_id' => '5',
            'sort' => '4',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '21',
            'master_point_id' => '6',
            'sort' => '5',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '21',
            'master_point_id' => '7',
            'sort' => '6',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '21',
            'master_point_id' => '8',
            'sort' => '7',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '21',
            'master_point_id' => '13',
            'sort' => '8',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '21',
            'master_point_id' => '32',
            'sort' => '9',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '21',
            'master_point_id' => '3',
            'sort' => '10',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '21',
            'master_point_id' => '26',
            'sort' => '11',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '21',
            'master_point_id' => '29',
            'sort' => '12',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '21',
            'master_point_id' => '27',
            'sort' => '13',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '21',
            'master_point_id' => '28',
            'sort' => '14',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '22',
            'master_point_id' => '16',
            'sort' => '1',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '22',
            'master_point_id' => '23',
            'sort' => '2',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '22',
            'master_point_id' => '22',
            'sort' => '3',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '22',
            'master_point_id' => '21',
            'sort' => '4',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '22',
            'master_point_id' => '30',
            'sort' => '5',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '22',
            'master_point_id' => '35',
            'sort' => '6',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '22',
            'master_point_id' => '31',
            'sort' => '7',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '22',
            'master_point_id' => '29',
            'sort' => '8',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '22',
            'master_point_id' => '3',
            'sort' => '9',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '22',
            'master_point_id' => '26',
            'sort' => '10',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '22',
            'master_point_id' => '25',
            'sort' => '11',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '23',
            'master_point_id' => '21',
            'sort' => '1',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '23',
            'master_point_id' => '19',
            'sort' => '2',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '23',
            'master_point_id' => '18',
            'sort' => '3',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '23',
            'master_point_id' => '17',
            'sort' => '4',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '23',
            'master_point_id' => '11',
            'sort' => '5',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '23',
            'master_point_id' => '10',
            'sort' => '6',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '23',
            'master_point_id' => '1',
            'sort' => '7',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '23',
            'master_point_id' => '6',
            'sort' => '8',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '23',
            'master_point_id' => '5',
            'sort' => '9',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '23',
            'master_point_id' => '4',
            'sort' => '10',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '23',
            'master_point_id' => '2',
            'sort' => '11',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '23',
            'master_point_id' => '3',
            'sort' => '12',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '24',
            'master_point_id' => '36',
            'sort' => '1',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '24',
            'master_point_id' => '12',
            'sort' => '2',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '24',
            'master_point_id' => '11',
            'sort' => '3',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '24',
            'master_point_id' => '15',
            'sort' => '4',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '24',
            'master_point_id' => '14',
            'sort' => '5',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '24',
            'master_point_id' => '6',
            'sort' => '6',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '24',
            'master_point_id' => '5',
            'sort' => '7',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '24',
            'master_point_id' => '4',
            'sort' => '8',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            
        DB::table('checkpoints')->insert([
            'transit_id' => '24',
            'master_point_id' => '2',
            'sort' => '9',
            'arrival_date' => null,
            'arrival_ip' => '',
            'information' => '',                    
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString(),
        ]);
            

    }

}
