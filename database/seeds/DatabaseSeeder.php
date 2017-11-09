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
        $user = factory(\App\User::class)->create();

//        $activity = factory(App\Activity::class, 10)->create();
//        $this->call(UserTableSeeder::class);
    }
}
