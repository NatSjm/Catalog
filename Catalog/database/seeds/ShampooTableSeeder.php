<?php

use Illuminate\Database\Seeder;

class ShampooTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Shampoo::class, 10)->create()->each(function ($shampoo) {

            $shampoo->products()->save(
                factory(App\Product::class)->make([
                    'productable_id' => $shampoo->id,
                    'productable_type' => App\Shampoo::class,
                    'category_id' => 1
                ])
            );
        });
    }
}
