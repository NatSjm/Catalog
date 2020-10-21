<?php
use Illuminate\Database\Seeder;

class SolidShampooTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

        public function run()
    {
        factory(App\SolidShampoo::class, 10)->create()->each(function ($solidShampoo) {

            $solidShampoo->products()->save(
                factory(App\Product::class)->make([
                    'productable_id' => $solidShampoo->id,
                    'productable_type' => App\SolidShampoo::class,
                    'category_id' => 1
                ])
            );
        });
    }
}
