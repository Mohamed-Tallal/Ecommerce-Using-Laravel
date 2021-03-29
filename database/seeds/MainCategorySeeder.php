<?php

use Illuminate\Database\Seeder;

class MainCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Category::create([
           'name_en' => 'Electronics',
            'name_de' => 'Elektronik',
        ]);
        App\Models\Category::create([
            'name_en' => " Women's Fashion",
            'name_de' => 'Frauenmode',
        ]);
        App\Models\Category::create([
            'name_en' => " Men's Fashion",
            'name_de' => 'Männermode',
        ]);
        App\Models\Category::create([
        'name_en' => 'Smart Home',
        'name_de' => 'Intelligentes Zuhause',
    ]);

        App\Models\Category::create([
            'name_en' => 'Computers',
            'name_de' => 'Computers',
        ]);
        App\Models\Category::create([
        'name_en' => 'Arts & Crafts',
        'name_de' => 'Kunst und Skulpturen',
        ]);
        App\Models\Category::create([
            'name_en' => 'Automotive',
            'name_de' => 'Automobil',
        ]);
    }
}
