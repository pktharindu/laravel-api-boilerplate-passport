<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        if (App::environment('local') || App::environment('staging')) {
            $this->call(AuthTableSeeder::class);
        }

        // $this->call(UsersTableSeeder::class);
    }
}
