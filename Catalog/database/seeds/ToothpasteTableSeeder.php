<?php

use App\Product;
use App\Shampoo;
use Illuminate\Database\Seeder;

class ToothpasteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Toothpaste::class, 10)->create()->each(function ($toothpaste) {

            $toothpaste->products()->save(
                factory(App\Product::class)->make([
                    'productable_id' => $toothpaste->id,
                    'productable_type' => App\Toothpaste::class,
                    'category_id' => 2
                ])
            );
        });
    }
}
