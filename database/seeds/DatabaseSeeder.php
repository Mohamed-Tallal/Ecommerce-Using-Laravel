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
        $this->call(LaratrustSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MainCategorySeeder::class);
        $this->call(CobonSeeder::class);
        $this->call(NewsLettersSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(TagSeeder::class);
    }
}
