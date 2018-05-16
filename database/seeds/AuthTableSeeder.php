<?php

use Illuminate\Database\Seeder;

class AuthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(App\Models\User::class, 20)->create()->each(function ($user) {
            $user->save();
        });
    }
}
