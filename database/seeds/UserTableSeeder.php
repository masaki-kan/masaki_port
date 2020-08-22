<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
        [
          'name' => 'ジョン',
          'email' => 'test1@test.com',
          'password' => Hash::make('pass1234567'),
          'sex' => '1',
          'img_name' => 'sample_1.png',
        ],
        [
        'name' => 'カーター',
        'email' => 'test2@test.com',
        'password' =>  Hash::make('pass1234567'),
        'sex' => '0',
        'img_name' => 'sample_2.png',
        ],
        [
        'name' => 'マイケル',
        'email' => 'test3@test.com',
        'password' =>  Hash::make('pass1234567'),
        'sex' => '1',
        'img_name' => 'sample_3.png',
        ],
      ]);

      
    }
}
