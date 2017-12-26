<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InstructionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('myInstructions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'course'  => '1',
            'content' => 'Dajem instrukcije iz kolegija Baze podataka.',                
            'user_id' => '1',            
        ]);

        DB::table('myInstructions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'course'  => '2',
            'content' => 'Dajem instrukcije iz kolegija Projektiranje informacijskih sustava.',                
            'user_id' => '4',            
        ]);

        DB::table('myInstructions')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'course'  => '3',
            'content' => 'Dajem instrukcije iz kolegija Algoritmi.',                
            'user_id' => '3',            
        ]);
    }
}
