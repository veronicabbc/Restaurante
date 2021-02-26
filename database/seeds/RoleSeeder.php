<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                "role" => "Administrador",
            ],
            [
                "role" => "Operario",
            ]
        );
        foreach ($data as $key => $value) {
            Role::create($data[$key]);
        }

    }
}
