<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('TeachersTableSeeder');
        $this->call('CoursesTableSeeder');
        $this->call('StudentsTableSeeder');
        $this->call('StudentTakeCourseTableSeeder');
    }
}
