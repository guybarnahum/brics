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
        // remove fake users
        \App\Models\User::where('test', '=', true)->delete();
        
        // fake new users
        factory(\App\Models\User::class, $num)->create();
    }
}
