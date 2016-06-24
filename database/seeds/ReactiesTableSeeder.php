<?php

use Illuminate\Database\Seeder;

class ReactiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = factory(App\Reactie::class, 100)->create()->each(function($comment){
            $comment->save();

        });
    }
}
