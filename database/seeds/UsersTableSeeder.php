<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run($num = 50)
    {
        factory(\App\User::class, $num)->create();
    }
}
