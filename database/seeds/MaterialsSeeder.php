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
        DB::table('myMaterials')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'course'  => '3',
            'content' => 'Lorem Ipsum je jednostavno probni tekst 
                        koji se koristi u tiskarskoj i slovoslagarskoj industriji. 
                        Lorem Ipsum postoji kao industrijski standard još od 16-og stoljeća, 
                        kada je nepoznati tiskar uzeo tiskarsku galiju slova i posložio ih da
                        bi napravio knjigu s uzorkom tiska. Taj je tekst ne samo preživio pet stoljeća,
                        već se i vinuo u svijet elektronskog slovoslagarstva, ostajući u suštini nepromijenjen.',                
            'user_id' => '1',   
        ]);
    }
}
