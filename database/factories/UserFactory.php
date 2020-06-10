<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Course;
use App\Quiz;
use App\Question;
use App\Track;
use App\Video;
use App\Photo;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'score' =>$faker->randomElement([100,150,200,350]),
        'admin'=> $faker->randomElement([0, 1]),
    ];
});


$factory->define(Photo::class, function (Faker $faker) {
    $user_id = User::all()->random()->id;
    $course_id = Course::all()->random()->id;

    $photoable_id = $faker ->randomElement([$user_id, $course_id]);
    $photoable_type = $photoable_id == $user_id ? 'App\User' : 'App\Course';
    return [
        'filename'=>$faker->randomElement(['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg','9.jpg','10.jpg']),
        'photoable_id' => $photoable_id,
        'photoable_type' => $photoable_type,
    ];
});


$factory->define(Course::class, function (Faker $faker) {
    return [
        'title'=>$faker ->sentence(3),
        'status'=>$faker->randomElement([0 , 1]),
        'link' =>$faker -> url,
        // 'track_id'=>factory(App\Track::class),
        'track_id'=>Track::all()->random()->id,
    ];
});


$factory->define(Track::class, function (Faker $faker) {
    return [
        'name'=>$faker ->name,
    ];
});


$factory->define(Video::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(3),
        'link' =>$faker-> url,
        'course_id'=>Course::all()->random()->id,
        //'course_id'=>factory(App\Course::class),
    ];
});


$factory->define(Quiz::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'course_id'=>Course::all()->random()->id,
        // 'course_id'=>factory(App\Course::class),
    ];
});

$factory->define(Question::class, function (Faker $faker) {
    $answers = $faker ->sentence(3);
    $right_answer = $faker->randomElement(explode(' ', $answers));
    return [
        'title'=>$faker->sentence(3),
        'answers'=>$answers,
        'right_answer'=>$right_answer,
        'score'=>$faker->randomElement([100,150,200,350]),
        'quiz_id'=>Quiz::all()->random()->id,
        // 'quiz_id'=>factory(App\Quiz::class),
    ];
});


