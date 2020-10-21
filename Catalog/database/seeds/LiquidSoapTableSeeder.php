<?php


use Illuminate\Database\Seeder;

class LiquidSoapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\LiquidSoap::class, 10)->create()->each(function ($liquidSoap) {

            $liquidSoap->products()->save(
                factory(App\Product::class)->make([
                    'productable_id' => $liquidSoap->id,
                    'productable_type' => App\LiquidSoap::class,
                    'category_id' => 3
                ])
            );
        });
    }
}
