<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CobonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0 ; $i<=50 ;$i+=5){
            \App\Models\Cobon::create([
                'name' => Str::random(6),
                'percentage' => $i
        ]);
        }
    }
}
