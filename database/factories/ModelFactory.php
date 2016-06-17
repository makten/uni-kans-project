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
        'avatar'=> $faker->image(public_path().'/uploads/users'),
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
        'pro_avatar' => $faker->image(public_path().'/uploads/innovations'),
        'user_id' => factory(\App\User::class)->create()->id,
        'team_id' => factory(\App\Team::class)->create()->id,
    ];
});

$factory->define(App\Team::class, function(Faker\Generator $faker){
    return [
        'team_name' => $faker->companySuffix,
    ];
});


$factory->define(App\Thema::class, function(Faker\Generator $faker){
    return [
        'thema_name' => $faker->colorName,
    ];
});

$factory->define(App\UserProfile::class, function(Faker\Generator $faker){

    return [
        'avatar'  => $faker->imageUrl($width = 640, $height = 480),
        'avatar_resized'  => $faker->imageUrl($width = 200, $height = 200),
        'avatar_thumbnail'  => $faker->imageUrl($width = 150, $height = 150),
        'skin' => 'skin-red',
        'skin_color_code' => $faker->hexColor,
        'user_id' => factory(\App\User::class)->create()->id

    ];
});

//'pro_contactperson' => function(){
//    return factory(App\User::class)->create()->id;
//},
