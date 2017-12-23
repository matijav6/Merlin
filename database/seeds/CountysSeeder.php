<?php

use Illuminate\Database\Seeder;

class CountysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countys')->insert([            
            'name' => 'Zagrebačka županija'
        ]);
        DB::table('countys')->insert([            
            'name' => 'Splitsko-dalmatinska županija'
        ]);
        DB::table('countys')->insert([            
            'name' => 'Varaždinska županija'
        ]);
        DB::table('countys')->insert([            
            'name' => 'Međimurska županija'
        ]);        
    }
}
