<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MaterialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materials')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'course'  => '3',
            'content' => 'Word.docx',                
            'user_id' => '3',   
        ]);
    }
}
