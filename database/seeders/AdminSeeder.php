<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
          'id' => 1,
          'name' => 'admin',
          'password' => 'admin123',
          'email' => 'admin@gmail.com',
          'count_of_links' =>0,
          'image' => null,
          ]);
    }
}
