<?php

use Illuminate\Database\Seeder;

class UserProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userprofiles = factory(App\UserProfile::class, 30)->create()->each(function($profile){
            $profile->save();
        });
    }
}
