<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

//$factory->define(App\User::class, function (Faker\Generator $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->email,
//        'password' => bcrypt(str_random(10)),
//        'remember_token' => str_random(10),
//    ];
//});



$factory->define(App\User::class, function(Faker\Generator $faker){
    return [
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt('secret'),
        'department' => $faker->colorName,
        'function' => $faker->word,
        'last_login' => $faker->dateTime,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\UserProfile::class, function(Faker\Generator $faker){

    return [
        'avatar'  => $faker->image(public_path().'/uploads/users', 200, 200, null, true, false),
        'avatar_thumbnail'  => $faker->image(public_path().'/uploads/users', 200, 200, null, true, false),
        'skin' => 'skin-red',
        'skin_color_code' => $faker->hexColor,
        'user_id' => factory(\App\User::class)->create()->id

    ];
});

$factory->define(App\Propositie::class, function(Faker\Generator $faker){
    return [
        'pro_name' => $faker->sentence,
        'pro_slug' => $faker->slug,
        'pro_description' => $faker->paragraph,
        'pro_status' => $faker->word,
        'pro_state' => $faker->word,
        'pro_uniek' => $faker->colorName,
        'pro_themas' => str_random(10),
        'pro_marktsegmenten' => str_random(10),
        'pro_revenuen' => $faker->randomDigit,
        'pro_avatar' => $faker->image(public_path().'/uploads/innovations'),
        'user_id' => factory(\App\User::class)->create()->id,


    ];
});

$factory->define(App\Team::class, function(Faker\Generator $faker){
    return [
        'team_name' => $faker->sentence,
        'photo_url' =>  $faker->imageUrl(640, 480),
    ];
});

$factory->define(App\Task::class, function(Faker\Generator $faker){
    return [
        'task_name' => $faker->sentence,
        'description' => $faker->paragraph,
        'completed' => $faker->boolean
    ];
});


$factory->define(App\Thema::class, function(Faker\Generator $faker){
    return [
        'thema_name' => $faker->colorName,
//        'propositie_id' => random_int(1, 30),

    ];
});

$factory->define(App\Reactie::class, function(Faker\Generator $faker){
    return [
        'message' => $faker->paragraph,
        'user_id' => factory(App\User::class)->create()->id,
        'propositie_id' => factory(App\Propositie::class)->create()->id,
    ];
});

