<?php

use App\OperationType;
use Illuminate\Database\Seeder;

class OperationTypeSeeder extends Seeder
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
                'operation' => 'entrada',
            ],
            [
                'operation' => 'salida',

            ],

        );

        foreach ($data as $key => $value) {
            OperationType::create($data[$key]);
        }
    }
}
