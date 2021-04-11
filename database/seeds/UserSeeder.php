<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $user = \App\Models\User::create([
                'name' => 'Mohamed Tallal',
                'email' => 'mohamedtallal@gmail.com',
                'password' => bcrypt('123456789')
            ]);
            $user->attachRole('super_admin');


    }
}
