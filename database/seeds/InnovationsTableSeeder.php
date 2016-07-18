<?php

use Illuminate\Database\Seeder;

class InnovationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proposities = factory(App\Propositie::class, 30)->create()->each(function($propositie){
            $propositie->user()->save(factory(App\User::class)->make());
            $propositie->team()->save(factory(App\Team::class)->make());

        });
    }
}
