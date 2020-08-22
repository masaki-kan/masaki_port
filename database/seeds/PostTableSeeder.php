<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([
          [
            'lang_id' => '1',
            'user_id' => '1',
            'text' => 'htmlのテスト',
          ],
          [
            'lang_id' => '2',
            'user_id' => '2',
            'text' => 'cssのテスト',
          ]
          ,
          [
            'lang_id' => '3',
            'user_id' => '3',
            'text' => 'scssのテスト',
          ],
          [
            'lang_id' => '4',
            'user_id' => '1',
            'text' => 'phpのテスト',
          ],
          [
            'lang_id' => '5',
            'user_id' => '2',
            'text' => 'Javascriptのテスト',
          ],
          [
            'lang_id' => '6',
            'user_id' => '2',
            'text' => 'Ruby on Lailsのテスト',
          ],
        ]);
    }
}
