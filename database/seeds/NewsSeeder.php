<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'course'  => '1',
            'content' => 'Danas nema labosa.',                
            'user_id' => '1',   
        ]);

        DB::table('news')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'course'  => '2',
            'content' => 'Sutra pišemo malo laški kontrolni.',                
            'user_id' => '3',   
        ]);

        DB::table('news')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'course'  => '3',
            'content' => 'Odgoda predavanja',                
            'user_id' => '4',   
        ]);
    }
}
