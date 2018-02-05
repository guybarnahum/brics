<?php

use Illuminate\Database\Seeder;

class PropertyPhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run($num = 50)
    {
        factory(\App\Models\PropertyPhoto::class, $num)->create();
    }
}
