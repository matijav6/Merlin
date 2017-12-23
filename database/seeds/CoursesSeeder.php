<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),        
                'name' => 'Baze podataka',                
                'aka' => 'BP',                
                'fax_id' => '3', 
        ]);
        DB::table('courses')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),        
                'name' => 'Projektiranje informacijskih sustava',                
                'aka' => 'PIS',                
                'fax_id' => '3', 
        ]);
        DB::table('courses')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),        
                'name' => 'Algoritmi',                
                'aka' => 'ALG',                
                'fax_id' => '3', 
        ]);
    }
}
