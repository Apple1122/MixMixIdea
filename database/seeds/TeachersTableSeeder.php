<?php

use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            'teacher_id' => str_random(10),
            'name' => "魚尾尾",
            'account' => 'yuweiwei',
            'password' => bcrypt('1234'),
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()
        ]);
    }
}
