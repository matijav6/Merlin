<?php

use Illuminate\Database\Seeder;

class UsersFaxesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('UsersCollegesAndCourses')->insert([            
            'user_id' => '1',
            'fax_id' => '3',
            'course_id' => '3',
        ]);
        DB::table('UsersCollegesAndCourses')->insert([            
            'user_id' => '2',
            'fax_id' => '4',
            'course_id' => '1'
        ]);
    }
}
