<?php

use Illuminate\Database\Seeder;

class BricsWalletsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run($num = 10)
    {
        factory(\App\Models\BricsWallet::class, $num)->create();
    }
}
