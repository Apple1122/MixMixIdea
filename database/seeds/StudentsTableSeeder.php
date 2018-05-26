<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'student_id' => str_random(10),
            'name' => "小魚尾尾",
            'account' => 'test1',
            'password' => bcrypt('1234'),
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()
        ]);

        DB::table('students')->insert([
            'student_id' => str_random(10),
            'name' => "小小魚尾",
            'account' => 'test2',
            'password' => bcrypt('1234'),
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()
        ]);

        DB::table('students')->insert([
            'student_id' => str_random(10),
            'name' => "小小小魚尾",
            'account' => 'test3',
            'password' => bcrypt('1234'),
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()
        ]);
    }
}
