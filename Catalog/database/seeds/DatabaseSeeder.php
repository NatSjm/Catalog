<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(FragranceTableSeeder::class);
        $this->call(ShampooTableSeeder::class);
        $this->call(SolidShampooTableSeeder::class);
        $this->call(ToothpasteTableSeeder::class);
        $this->call(SoapTableSeeder::class);
        $this->call(LiquidSoapTableSeeder::class);
        // $this->call(UserSeeder::class);
    }
}
