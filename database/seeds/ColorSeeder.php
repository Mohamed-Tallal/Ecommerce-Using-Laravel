<?php

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Color::create([
           'name' => 'Black',
            'code'=>'#000000'
        ]);
        \App\Models\Color::create([
            'name' => 'Dark Orange',
            'code'=>'#D35400'
        ]);
        \App\Models\Color::create([
            'name' => 'Blue',
            'code'=>  '#2E86C1'
        ]);
    }
}
