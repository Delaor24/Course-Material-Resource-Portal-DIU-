<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         DB::table('admins')->insert([
         	 'name' => 'Md. Deloar Hossain',
             'email' => 'deloar.engr@gmail.com',
             'password' => bcrypt('admin12'),
         ]);
    }
}
