<?php
use App\Track;
use App\Quiz;
use App\Course;
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
        // $this->call([UsersTableSeeder::class]);
        $users = Factory('App\User', 10)->create();


        $tracks = Factory('App\Track', 10)->create();
        foreach ($users as $user){
            $tracks_ids = [];
            $tracks_ids[] = Track::all()->random()->id;
            $tracks_ids[] = Track::all()->random()->id;
            $user->tracks()->sync( $tracks_ids );
        }


        Factory('App\Course', 50)->create();
        $courses = Factory('App\Quiz', 100)->create();
        foreach ($users as $user){
            $courses_ids = [];
            $courses_ids[] = Course::all()->random()->id;
            $courses_ids[] = Course::all()->random()->id;
            $courses_ids[] = Course::all()->random()->id;
            $user->Courses()->sync( $courses_ids );
        }


        Factory('App\Video', 100)->create();


        $quizzes = Factory('App\Quiz', 100)->create();
        foreach ($users as $user){
            $quizzes_ids = [];
            $quizzes_ids[] = Quiz::all()->random()->id;
            $quizzes_ids[] = Quiz::all()->random()->id;
            $quizzes_ids[] = Quiz::all()->random()->id;
            $user->quizzes()->sync( $quizzes_ids );
        }


        Factory('App\Question', 200)->create();
        Factory('App\Photo', 50)->create();
    }
}
