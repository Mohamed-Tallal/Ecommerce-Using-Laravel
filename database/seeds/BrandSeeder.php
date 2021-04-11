<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0 ;$i<=5;$i++){
            \App\Models\BradCategory::create([

                'name' => 'name1',
                'logo' => $i.'.png',

            ]);
        }
    }
}
