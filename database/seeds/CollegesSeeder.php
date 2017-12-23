<?php

use Illuminate\Database\Seeder;

class CollegesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colleges')->insert([            
            'name' => 'Fakultet elektrotehnike i računarstva',
            'aka' => 'FER',
            'county_id' => '1',
        ]);
        DB::table('colleges')->insert([            
            'name' => 'Filozofski fakultet Zagreb',
            'aka' => 'FFZG',
            'county_id' => '1',
        ]);
        DB::table('colleges')->insert([            
            'name' => 'Fakultet organizacije i informatike',
            'aka' => 'FOI',
            'county_id' => '3',
        ]);
        DB::table('colleges')->insert([            
            'name' => 'Sveučilište sjever Varaždin',
            'aka' => 'UNIN',
            'county_id' => '3',
        ]);
        DB::table('colleges')->insert([            
            'name' => 'Ekonomski fakultet Split',
            'aka' => 'EFST',
            'county_id' => '2',
        ]);
        DB::table('colleges')->insert([            
            'name' => 'Međimursko veleučilište',
            'aka' => 'MEV',
            'county_id' => '4',
        ]);

    }
}
