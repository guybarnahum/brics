<?php

use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run($num = 50)
    {
        factory(\App\Models\Property::class, $num)->create();
    }
}
