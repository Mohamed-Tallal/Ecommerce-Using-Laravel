<?php

use Illuminate\Database\Seeder;

class NewsLettersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 25 ;$i++)
        {
            \App\Models\NewsLetter::create([
                'email' => 'newsLetter'.$i.'@gmail.com',
            ]);
        }
    }
}
