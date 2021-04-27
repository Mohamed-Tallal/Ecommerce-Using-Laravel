<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Tag::create([
            'name' => 'Powerbank',
        ]);

        \App\Models\Tag::create([
            'name' => 'Charger',
        ]);

        \App\Models\Tag::create([
            'name' => 'Phone',
        ]);

        \App\Models\Tag::create([
            'name' => 'Smartphone',
        ]);
        \App\Models\Tag::create([
            'name' => 'Electronic',
        ]);

    }
}
