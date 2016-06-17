<?php

use Illuminate\Database\Seeder;

class ThemaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $themas = factory(\App\Thema::class, 6)->create()->each(function($thema){
           $thema->save();
        });
    }
}
