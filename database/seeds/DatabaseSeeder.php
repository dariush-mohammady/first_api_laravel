<?php

use App\Course;
use App\Episode;
use App\User;
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
        // $this->call(UsersTableSeeder::class);

        

        $user = factory(App\User::class)->create();
        factory(\App\Course::class , 5)->create(['user_id' => $user->id ])->each(function ($course) {
           factory(\App\Episode::class, rand(6 , 20))->make()->each(function ($episode , $key) use ($course){
               $episode->number = $key +1;
               $course->episodes()->save($episode);
           });
        });
    }
}
