<?php

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
//        Model::unguard();
//         $this->call(UsersTableSeeder::class);
         $this->call(InnovationsTableSeeder::class);
         $this->call(ThemaTableSeeder::class);
//         $this->call(UserProfileTableSeeder::class);
    }
}
