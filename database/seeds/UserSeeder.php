<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "nicolem",
            "username" => "nicolem",
            "password" => bcrypt("demo"),
            "role_id" => 1
        ]);
    }
}
