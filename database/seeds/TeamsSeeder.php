<?php

use Illuminate\Database\Seeder;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = factory(App\Team::class, 30)->create()->each(function($team){
            $$team->users()->save(factory(App\User::class)->make());
            $$team->propositie()->save(factory(App\Propositie::class)->make());
        });
    }
}


//'user_id' => factory(\App\User::class)->create()->each(function($u){
//    $u->userprofile()->save(factory(UserProfile::class)->make()->id);
//})->id,
//        'team_id' => factory(\App\Team::class)->create()->id,