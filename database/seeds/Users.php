<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Matija Vuk',
            'email' => 'matija.vuk.97@gmail.com',
            'password' => Hash::make('pass'),            
            'is_admin' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'Ana Florijanović',
            'email' => 'ana.florijanovic@gmail.com',
            'password' => Hash::make('pass'),        
        ]);

        DB::table('users')->insert([
            'name' => 'Toni Toplek',
            'email' => 'toni.toplek@gmail.com',
            'password' => Hash::make('pass'),        
        ]);

        DB::table('users')->insert([
            'name' => 'Dora Trogrlić',
            'email' => 'dora.trogrlic@gmail.com',
            'password' => Hash::make('pass'),        
        ]);
    }
}
