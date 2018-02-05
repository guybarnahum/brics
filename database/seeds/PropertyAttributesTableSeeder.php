<?php

use Illuminate\Database\Seeder;

class PropertyAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run($num = 50)
    {
        factory(\App\Models\PropertyAttribute::class, $num)->create();
    }
}
