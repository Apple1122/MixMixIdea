<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher = DB::table('teachers')->where('name', '魚尾尾')->first();;
        
        $courseName = array("企業資源管理", '程式設計', '微積分', '統計學', '系統分析');

        foreach($courseName as $c){
            DB::table('courses')->insert([            
                'department' => "資管系",
                'name' => $c,
                'class_time' => '三 5,6',
                'teacher_id' => $teacher->teacher_id,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ]);
        }
        

        
    }
}
