<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Quiz;
use App\Course;
use App\Section;
use App\Content;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create(array(
          'name' => 'Android Course',
          'description' => 'for Student who interest in android application devlopment'
        ));

        User::create(array(
        'name' => 'Satjawat',
        'email' => 'peanutbutteer@gmail.com',
        'password' => bcrypt('panakorn')
      ));

      Section::create(array(
        'description' => 'first section',
        'title' => 'section one',
        'section_id' => null,
        'course_id' => 1
      ));

      Section::create(array(
        'description' => 'first sub section',
        'title' => 'sub section one',
        'course_id' => '1',
        'section_id' => 1
      ));

      Content::create(array(
        'article' => 'first article on section one',
        'section_id' => 2
      ));


    }
}
