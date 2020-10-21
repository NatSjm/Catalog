<?php

use Illuminate\Database\Seeder;

class SoapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Soap::class, 10)->create()->each(function ($soap) {

            $soap->products()->save(
                factory(App\Product::class)->make([
                    'productable_id' => $soap->id,
                    'productable_type' => App\Soap::class,
                    'category_id' => 3
                ])
            );
        });
    }
}
