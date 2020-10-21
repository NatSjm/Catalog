<?php

use Illuminate\Database\Seeder;

class FragranceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Fragrance::class, 20)->create();
    }
}
