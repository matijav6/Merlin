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
        $this->call(Users::class);        
        $this->call(CollegesSeeder::class);
        $this->call(CountysSeeder::class);
        $this->call(CoursesSeeder::class);
        $this->call(UsersFaxesSeeder::class);
        $this->call(InstructionsSeeder::class);
        $this->call(MaterialsSeeder::class);
        $this->call(NewsSeeder::class);
    }
}
