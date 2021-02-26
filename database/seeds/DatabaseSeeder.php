<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RoleSeeder::class);
         $this->call(UserSeeder::class);
         $this->call(OperationTypeSeeder::class);
         $this->call(ProductSeeder::class);        
         $this->call(ClientSeeder::class);
         $this->call(InventorySeeder::class);
         $this->call(BillSeeder::class);
    }
}
