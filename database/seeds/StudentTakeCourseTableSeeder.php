<?php

use Illuminate\Database\Seeder;

class StudentTakeCourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = DB::table('students')->get();
        $courses = DB::table('courses')->get();
        
        foreach($courses as $c){
            foreach( $students as $s){
                DB::table('student_take_course')->insert([
                    'student_id' => $s->student_id,
                    'course_id' => $c->id,
                    "created_at" =>  \Carbon\Carbon::now(),
                    "updated_at" => \Carbon\Carbon::now()
                ]);
            }
        }
    }
}
